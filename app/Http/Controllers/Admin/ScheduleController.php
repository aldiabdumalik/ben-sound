<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NotifyMail;
use App\Models\Schedule;
use App\Models\Track;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
            'email' => 'required|email',
            'password' => 'required',
            'location' => 'required',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);

        try {
            $model = Schedule::create([
                'email' => $request->email,
                'schedule_location' => $request->location,
                'schedule_start' => $request->start,
                'schedule_end' => $request->end,
            ]);

            $user = User::where('email', $request->email)->first();

            if ($user) {
                $user->name = $request->location;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);

                $user->save();
            }else{
                $user = User::create([
                    'name' => $request->location,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
                $user->assignRole('user');
            }


            Track::create([
                'schedule_id' => $model->id,
                'status' => 'On Schedule',
                'icon' => 'fa-clipboard-list',
            ]);

            $content = [
                'email' => $request->email,
                'password' => $request->password,
                'status' => 'On Schedule'
            ];

            Mail::to($request->email)->send(new NotifyMail($content));
            
            return thisSuccess('Data saved successfully!');
        } catch (Exception $e) {
            return thisError("Failed to save because : ". $e->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'location' => 'required',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);

        try {
            $model = Schedule::find($id);
            $model->email = $request->email;
            $model->schedule_location = $request->location;
            $model->schedule_start = $request->start;
            $model->schedule_end = $request->end;
            $model->save();
            
            $user = User::where('email', $request->email)->first();
            
            $user->name = $request->location;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            $track = Track::where('schedule_id', $id)
                ->orderBy('created_at', 'DESC')
                ->first();

            $content = [
                'email' => $request->email,
                'password' => $request->password,
                'status' => $track->status
            ];

            Mail::to($request->email)->send(new NotifyMail($content));

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
