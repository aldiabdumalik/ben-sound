<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NotifyMail;
use App\Models\Schedule;
use App\Models\Track;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
            // Track::create([
            //     'schedule_id' => $request->schedule,
            //     'status' => $request->status,
            //     'icon' => $request->icon,
            // ]);

            $track = new Track;
            $track->schedule_id = $request->schedule;
            $track->status = $request->status;
            $track->icon = $request->icon;

            if ($img = $request->file('image')) {
                $imgName = time() . '.' . $img->getClientOriginalExtension();
                $img->move(public_path('files/tracks'), $imgName);
    
                $track->image = $imgName;
            }
            $track->save();

            $schedule = Schedule::find($request->schedule);

            $content = [
                'email' => $schedule->email,
                'password' => 'Cek email dari kami pertama kali atau hubungi admin untuk meminta password kembali',
                'status' => $request->status
            ];

            Mail::to($schedule->email)->send(new NotifyMail($content));
            
            return thisSuccess('Data saved successfully!', $request->schedule);
        } catch (Exception $e) {
            return thisError("Failed to save because : ". $e->getMessage());
        }
    }
}
