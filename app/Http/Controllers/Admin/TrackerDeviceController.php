<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alert;
use App\Models\GpsLocation;
use App\Models\TrackerDevice;
use App\Models\Camel;
use App\Models\User;
use Illuminate\Http\Request;

class TrackerDeviceController extends Controller
{
    public function index()
    {
        $devices = TrackerDevice::with('camel')->paginate(10);
        return view('admin.tracker_devices.index', compact('devices'));
    }

    public function create(Request $request)
    {
        $owners = User::where('role', 'owner')->select('id', 'name', 'civil_registry')->get();

        $camels = collect();
        if ($request->has('owner_id') && $request->owner_id != '') {
            $camels = Camel::with('gpsLocation')->where('owner_id', $request->owner_id)->get();
        }

        return view('admin.tracker_devices.create', compact('camels', 'owners'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'camel_id' => 'required|exists:camel,id',
            'device_type' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'device_model' => 'required|string|max:255',
            'firmware_version' => 'required|string|max:50',
        ]);
        TrackerDevice::create($request->all());
        $camel = Camel::find($request->camel_id);
        GpsLocation::updateOrCreate(
            ['camel_id' => $request->camel_id],
            [
                'timestamp' => now(),
                'latitude' => $request->latitude,
                'longitude' => $request->longitude
            ]
        );
        if ($camel && $camel->owner_id) {
            Alert::create([
                'user_id' => $camel->owner_id,
                'camel_id' => $camel->id,
                'type' => 'tracker_assigned',
                'message' => 'تم تعيين جهاز تتبع جديد للجمل: ' . $camel->name,
                'timestamp' => now(),
            ]);
        }
        toastr()->success('تم إضافة الجهاز وتحديث الموقع بنجاح');
        return redirect()->route('admin.tracker_devices.index');
    }

    public function edit(TrackerDevice $trackerDevice)
    {
        $camels = Camel::all();
        return view('admin.tracker_devices.edit', compact('trackerDevice', 'camels'));
    }

    public function update(Request $request, TrackerDevice $trackerDevice)
    {
        $request->validate([
            'camel_id' => 'required|exists:camel,id',
            'device_type' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'device_model' => 'required|string|max:255',
            'firmware_version' => 'required|string|max:50',
        ]);
        $trackerDevice->update($request->all());
        $camel = Camel::find($request->camel_id);
        if ($camel && $camel->owner_id) {
            Alert::create([
                'user_id' => $camel->owner_id,
                'camel_id' => $camel->id,
                'type' => 'tracker_updated',
                'message' => 'تم تحديث جهاز التتبع للجمل: ' . $camel->name,
                'timestamp' => now(),
            ]);
        }
        GpsLocation::updateOrCreate(
            ['camel_id' => $request->camel_id],
            [
                'timestamp' => now(),
                'latitude' => $request->latitude,
                'longitude' => $request->longitude
            ]
        );
        toastr()->success('تم تحديث بيانات الجهاز بنجاح');
        return redirect()->route('admin.tracker_devices.index');
    }

    public function destroy(TrackerDevice $trackerDevice)
    {
        $camel = Camel::find($trackerDevice->camel_id);
        $trackerDevice->delete();
        if ($camel && $camel->owner_id) {
            Alert::create([
                'user_id' => $camel->owner_id,
                'camel_id' => $camel->id,
                'type' => 'tracker_deleted',
                'message' => 'تم إزالة جهاز التتبع من الجمل: ' . $camel->name,
                'timestamp' => now(),
            ]);
        }
        toastr()->success('تم حذف الجهاز بنجاح');
        return redirect()->route('admin.tracker_devices.index');
    }
}
