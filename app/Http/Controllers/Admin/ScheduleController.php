<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Track;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('pages.schedule.index');
    }

    public function dt(Request $request)
    {
        $model = Schedule::query()->orderBy('schedule_start')->get();
        return DataTables::of($model)
            ->editColumn('schedule_start', function ($model){
                return date('d/m/Y', strtotime($model->schedule_start));
            })
            ->editColumn('schedule_end', function ($model){
                return date('d/m/Y', strtotime($model->schedule_end));
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);

        try {
            $model = Schedule::create([
                'schedule_location' => $request->location,
                'schedule_start' => $request->start,
                'schedule_end' => $request->end,
            ]);

            Track::create([
                'schedule_id' => $model->id,
                'status' => 'On Schedule',
                'icon' => 'fa-clipboard-list',
            ]);
            
            return thisSuccess('Data saved successfully!');
        } catch (Exception $e) {
            return thisError("Failed to save because : ". $e->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'location' => 'required',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);

        try {
            $model = Schedule::find($id);
            $model->schedule_location = $request->location;
            $model->schedule_start = $request->start;
            $model->schedule_end = $request->end;
            $model->save();

            return thisSuccess('Data updated successfully!');
        } catch (Exception $e) {
            return thisError("Failed to update because : ". $e->getMessage());
        } 
    }

    public function destroy($id)
    {
        try {
            $model = Schedule::find($id);
            // $model->track->delete();
            $model->delete();

            return thisSuccess('Data deleted successfully!');
        } catch (Exception $e) {
            return thisError("Failed to delete because : ". $e->getMessage());
        } 
    }

    public function detail($id)
    {
        $model = Schedule::find($id);

        if ($model) {
            return thisSuccess(1, $model);
        }

        return thisSuccess('Not Found');
    }
}
