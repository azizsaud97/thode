<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Camel;
use App\Models\HealthRecord;
use App\Models\BreedingRecord;
use App\Models\TrackerDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        return view('owner.reports.index');
    }

    public function healthReport()
    {
        $ownerId = Auth::id();

        $healthRecords = HealthRecord::whereHas('camel', function ($query) use ($ownerId) {
            $query->where('owner_id', $ownerId);
        })->orderByDesc('checkup_date')->get();


        $avg_weight = HealthRecord::avg('weight');
        $avg_height = HealthRecord::avg('height');
        $avg_heart_rate = HealthRecord::avg('heart_rate');

        return view('owner.reports.health', compact(
            'healthRecords',
            'avg_weight', 'avg_height', 'avg_heart_rate'
        ));
    }


    public function breedingReport()
    {
        $ownerId = Auth::id();

        $breedingRecords = BreedingRecord::whereHas('camel', function ($query) use ($ownerId) {
            $query->where('owner_id', $ownerId);
        })->orderByDesc('date')->get();

        $bestBreeder = Camel::where('owner_id', $ownerId)
            ->withCount(['breedingRecords' => function ($query) {
                $query->where('status', 'pregnant');
            }])
            ->orderByDesc('breeding_records_count')
            ->first();
        $worstBreeder = Camel::where('owner_id', $ownerId)
            ->withCount(['breedingRecords' => function ($query) {
                $query->where('status', '!=', 'pregnant');
            }])
            ->orderByDesc('breeding_records_count')
            ->first();

        $totalBreeding = BreedingRecord::whereHas('camel', function ($query) use ($ownerId) {
            $query->where('owner_id', $ownerId);
        })->count();

        $successfulBreeding = BreedingRecord::whereHas('camel', function ($query) use ($ownerId) {
            $query->where('owner_id', $ownerId);
        })->where('status', 'pregnant')->count();


        $successRate = $totalBreeding > 0 ? ($successfulBreeding / $totalBreeding) * 100 : 0;

        return view('owner.reports.breeding', compact(
            'breedingRecords', 'bestBreeder', 'worstBreeder',
            'totalBreeding', 'successRate'
        ));
    }


    public function trackerReport()
    {
        $ownerId = Auth::id();

        $trackerDevices = TrackerDevice::whereHas('camel', function ($query) use ($ownerId) {
            $query->where('owner_id', $ownerId);
        })->with(['camel', 'latestGps'])->get();
        $totalTrackers = $trackerDevices->count();
        $activeTrackers = $trackerDevices->where('status', 'active')->count();
        $activePercentage = $totalTrackers > 0 ? ($activeTrackers / $totalTrackers) * 100 : 0;

        return view('owner.reports.tracker', compact(
            'trackerDevices',
            'totalTrackers', 'activePercentage'
        ));
    }

}
