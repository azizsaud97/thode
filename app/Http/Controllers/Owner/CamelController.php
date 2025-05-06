<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Camel;
use Illuminate\Support\Facades\Auth;

class CamelController extends Controller
{
    public function index()
    {
        $camels = Camel::where('owner_id', Auth::id())->get();
        return view('owner.camels.index', compact('camels'));
    }

    public function create()
    {
        return view('owner.camels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tag_number' => 'required|unique:camel,tag_number|max:20',
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'weight' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female',
            'origin' => 'required|string|max:255',
            'health_status' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'health_issue' => 'nullable|string',
        ]);

        Camel::create([
            'tag_number' => $request->tag_number,
            'name' => $request->name,
            'breed' => $request->breed,
            'color' => $request->color,
            'weight' => $request->weight,
            'height' => $request->height,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'origin' => $request->origin,
            'health_status' => $request->health_status,
            'location' => $request->location,
            'health_issue' => $request->health_issue,
            'owner_id' => Auth::id(),
        ]);

        toastr()->success('تم إنشاء الجمل بنجاح');
        return redirect()->route('owner.camels.index');
    }

    public function edit(Camel $camel)
    {
        if ($camel->owner_id !== Auth::id()) {
            abort(403);
        }
        return view('owner.camels.edit', compact('camel'));
    }

    public function update(Request $request, Camel $camel)
    {
        if ($camel->owner_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'tag_number' => 'required|max:20|unique:camel,tag_number,' . $camel->id,
            'name' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'weight' => 'required|numeric|min:0',
            'height' => 'required|numeric|min:0',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:female,male',
            'origin' => 'required|string|max:255',
            'health_status' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'health_issue ' => 'nullable|string',
        ]);

        $camel->update($request->all());

        toastr()->success('تم تحديث بيانات الجمل بنجاح');
        return redirect()->route('owner.camels.index');
    }

    public function destroy(Camel $camel)
    {
        if ($camel->owner_id !== Auth::id()) {
            abort(403);
        }

        $camel->delete();
        toastr()->success('تم حذف الجمل بنجاح');
        return redirect()->route('owner.camels.index');
    }

    public function camelsDevices()
    {
        $camels = Camel::where('owner_id', Auth::id())->with(['trackerDevice', 'gpsLocation'])->paginate(10);

        return view('owner.camels_devices', compact('camels'));
    }

    public function trackCamels()
    {
        $camels = Camel::where('owner_id', Auth::id())->with('gpsLocation')->get();
        return view('owner.track_camels', compact('camels'));
    }

    public function trackCamelsData()
    {
        $camels = Camel::where('owner_id', Auth::id())->with('gpsLocation')->get();
        return response()->json($camels);
    }
}
