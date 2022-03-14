<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Track;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TrackingController extends Controller
{
    public function index()
    {
        return view('pages.track.index');
    }

    public function getSchedule(Request $request)
    {
        $month = ($request->month == null) ? date('m') : $request->month;

        $model = Schedule::withCount('track')
        ->whereRaw('MONTH(schedule_start) = ? AND YEAR(schedule_start) = ?', [$month, date('Y')])
        ->orderBy('schedule_start')->get();

        return thisSuccess('Data found', $model);
    }

    public function tracking($schedule_id)
    {
        $model = Track::where('schedule_id', $schedule_id)
        ->orderBy('created_at', 'ASC')
        ->get();

        return thisSuccess('OK', $model);
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required'
        ]);

        try {
            Track::create([
                'schedule_id' => $request->schedule,
                'status' => $request->status,
                'icon' => $request->icon,
            ]);
            return thisSuccess('Data saved successfully!', $request->schedule);
        } catch (Exception $e) {
            return thisError("Failed to save because : ". $e->getMessage());
        }
    }
}
