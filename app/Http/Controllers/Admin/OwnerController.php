<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Camel;
use App\Models\User;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = User::where('role', 'Owner')
            ->withCount('camels')
            ->paginate(10);
        return view('admin.owners.index', compact('owners'));
    }

    public function show($id)
    {
        $owner = User::where('role', 'Owner')->with('camels')->findOrFail($id);
        return view('admin.owners.show', compact('owner'));
    }

    public function listCamels(Request $request)
    {
        $query = Camel::with('owner');
        if ($request->has('breed') && $request->breed != '') {
            $query->where('breed', $request->breed);
        }

        if ($request->has('color') && $request->color != '') {
            $query->where('color', $request->color);
        }

        if ($request->has('gender') && $request->gender != '') {
            $query->where('gender', $request->gender);
        }
        if ($request->has('health_status') && $request->health_status != '') {
            $query->where('health_status', $request->health_status);
        }
        if ($request->has('owner_id') && $request->owner_id != '') {
            $query->where('owner_id', $request->owner_id);
        }
        $camels = $query->get();
        $breeds = Camel::select('breed')->distinct()->pluck('breed');
        $owners = User::where('role', 'Owner')->get();
        return view('admin.camels', compact('camels', 'breeds', 'owners'));
    }
}
