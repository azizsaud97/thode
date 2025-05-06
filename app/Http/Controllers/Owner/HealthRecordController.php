<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HealthRecord;
use App\Models\Camel;
use Illuminate\Support\Facades\Auth;

class HealthRecordController extends Controller
{
    public function index()
    {
        $healthRecords = HealthRecord::whereHas('camel', function ($query) {
            $query->where('owner_id', Auth::id());
        })->get();
        return view('owner.health_records.index', compact('healthRecords'));
    }

    public function create()
    {
        $camels = Camel::where('owner_id', Auth::id())->get();
        return view('owner.health_records.create', compact('camels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'camel_id' => 'required|exists:camel,id',
            'checkup_date' => 'required|date',
            'weight' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            'temperature' => 'required|numeric|min:30|max:45',
            'heart_rate' => 'required|integer|min:20|max:100',
            'blood_test_results' => 'nullable|string',
            'allergies' => 'nullable|string',
            'medications_given' => 'nullable|string',
            'next_checkup_date' => 'nullable|date',
            'diagnosis' => 'required|string',
            'treatment' => 'required|string',
            'veterinarian' => 'nullable|string|max:255',
        ]);

        HealthRecord::create($request->all());

        toastr()->success('تم إنشاء السجل الصحي بنجاح');
        return redirect()->route('owner.health_records.index');
    }

    public function edit(HealthRecord $healthRecord)
    {
        if ($healthRecord->camel->owner_id !== Auth::id()) {
            abort(403);
        }
        $camels = Camel::where('owner_id', Auth::id())->get();
        return view('owner.health_records.edit', compact('healthRecord', 'camels'));
    }

    public function update(Request $request, HealthRecord $healthRecord)
    {
        if ($healthRecord->camel->owner_id !== Auth::id()) {
            abort(403);
        }
        $request->validate([
            'camel_id' => 'required|exists:camel,id',
            'checkup_date' => 'required|date',
            'weight' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            'temperature' => 'required|numeric|min:30|max:45',
            'heart_rate' => 'required|integer|min:20|max:100',
            'blood_test_results' => 'nullable|string',
            'allergies' => 'nullable|string',
            'medications_given' => 'nullable|string',
            'next_checkup_date' => 'nullable|date',
            'diagnosis' => 'required|string',
            'treatment' => 'required|string',
            'veterinarian' => 'nullable|string|max:255',
        ]);
        $healthRecord->update($request->all());
        toastr()->success('تم تحديث السجل الصحي بنجاح');
        return redirect()->route('owner.health_records.index');
    }

    public function destroy(HealthRecord $healthRecord)
    {
        if ($healthRecord->camel->owner_id !== Auth::id()) {
            abort(403);
        }
        $healthRecord->delete();
        toastr()->success('تم حذف السجل الصحي بنجاح');
        return redirect()->route('owner.health_records.index');
    }
}
