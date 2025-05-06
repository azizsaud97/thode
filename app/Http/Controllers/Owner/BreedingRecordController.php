<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BreedingRecord;
use App\Models\Camel;
use Illuminate\Support\Facades\Auth;

class BreedingRecordController extends Controller
{
    public function index()
    {
        $breedingRecords = BreedingRecord::whereHas('camel', function ($query) {
            $query->where('owner_id', Auth::id());
        })->get();
        return view('owner.breeding_records.index', compact('breedingRecords'));
    }

    public function create()
    {
        $camels = Camel::where('owner_id', Auth::id())->get();
        return view('owner.breeding_records.create', compact('camels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'camel_id' => 'required|exists:camel,id',
            'mate_id' => 'required|exists:camel,id|different:camel_id',
            'date' => 'required|date',
            'status' => 'required|in:pregnant,not_pregnant',
        ]);

        BreedingRecord::create($request->all());

        toastr()->success('تم تسجيل عملية التزاوج بنجاح');
        return redirect()->route('owner.breeding_records.index');
    }

    public function edit(BreedingRecord $breedingRecord)
    {
        if ($breedingRecord->camel->owner_id !== Auth::id()) {
            abort(403);
        }
        $camels = Camel::where('owner_id', Auth::id())->get();
        return view('owner.breeding_records.edit', compact('breedingRecord', 'camels'));
    }

    public function update(Request $request, BreedingRecord $breedingRecord)
    {
        if ($breedingRecord->camel->owner_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'camel_id' => 'required|exists:camel,id',
            'mate_id' => 'required|exists:camel,id|different:camel_id',
            'date' => 'required|date',
            'status' => 'required|in:pregnant,not_pregnant',
        ]);

        $breedingRecord->update($request->all());

        toastr()->success('تم تحديث سجل التزاوج بنجاح');
        return redirect()->route('owner.breeding_records.index');
    }

    public function destroy(BreedingRecord $breedingRecord)
    {
        if ($breedingRecord->camel->owner_id !== Auth::id()) {
            abort(403);
        }

        $breedingRecord->delete();
        toastr()->success('تم حذف سجل التزاوج بنجاح');
        return redirect()->route('owner.breeding_records.index');
    }
}
