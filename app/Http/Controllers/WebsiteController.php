<?php

namespace App\Http\Controllers;

use App\Models\CompanyAbout;
use App\Models\CompanyBanner;
use App\Models\CompanyClient;
use App\Models\Contact;
use App\Models\ContactMessage;
use App\Models\Review;
use App\Models\Schedule;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function index()
    {
        $banner = CompanyBanner::find(1);
        $about = CompanyAbout::find(1);
        $client = CompanyClient::all();
        $contact = Contact::all();
        $banner_img = DB::table('banner_image')->orderByDesc('id')->get();
        $riview = Review::where('is_show',1)->latest()->get();
        return view('website.home', compact('banner', 'about', 'client', 'contact','banner_img','riview'));
    }

    public function indexTracking()
    {
        $contact = Contact::all();
        $schedules = Schedule::month(date('m'))->orderBy('schedule_start', 'DESC')->get();
        $count = (empty($schedules)) ? 0 : count($schedules);
        return view('website.tracking', compact('contact', 'schedules', 'count'));
    }
    public function indexReview()
    {
        $contact = Contact::all();
        $riview = Review::where('is_show', '1')->get();
        return view('website.review', compact('contact', 'riview'));
    }

    public function ajaxSchedule($bln)
    {
        $model = Schedule::month($bln)->orderBy('schedule_start', 'DESC')->get();

        if ($model->isEmpty()) {
            $result = [
                'bulan' => monthName($bln),
                'data' => 0
            ];
            return thisSuccess('Schedule on this month not found', $result);
        }

        $result = [
            'bulan' => monthName($bln),
            'data' => $model,
            'count' => count($model)
        ];

        return thisSuccess('OK', $result);
    }

    public function ajaxTracking($schedule_id)
    {
        $model = Track::where('schedule_id', $schedule_id)
        ->orderBy('created_at', 'ASC')
        ->get();

        return thisSuccess('OK', $model);
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        ContactMessage::create([
            'name' => strip_tags($request->name),
            'email' => strip_tags($request->email),
            'subject' => strip_tags($request->subject),
            'message' => strip_tags($request->message),
        ]);

        return thisSuccess('Your message has been send!');
    }

    public function sendRiview(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nilai' => 'required',
            'message' => 'required',
        ]);

        // $check = Review::where('schedule_id', $request->schedule)->get();

        // if ($check->isNotEmpty()) {
        //     return thisError('Riview untuk order ini sudah ada!');
        // }

        // $check = Schedule::where('email', auth()->user()->email)->where('id', $request->schedule)->get();

        // if ($check->isEmpty()) {
        //     return thisError('Order ini bukan milik Anda!');
        // }

        $review = new Review;
        // $review->schedule_id = $request->schedule;
        // $review->user_id = auth()->user()->id;
        $review->name = $request->name;
        $review->nilai = $request->nilai;
        $review->message = strip_tags($request->message);
        
        if ($img = $request->file('image')) {
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('files/review'), $imgName);
            $review->image = $imgName;
        }

        $review->save();

        // Review::create([
        //     'schedule_id' => $request->schedule,
        //     'user_id' => auth()->user()->id,
        //     'name' => auth()->user()->name,
        //     'nilai' => $request->nilai,
        //     'message' => strip_tags($request->message),
        // ]);

        return thisSuccess('Your riview has been send!');
    }

    static function scheduleWithLastTracking($month)
    {
        $db = DB::table('schedules as sch')
        ->leftJoin(DB::raw('
            (
                SELECT status AS last_status, schedule_id
                FROM tracks
                ORDER BY created_at DESC
                LIMIT 1
            ) as track
        '), function($join){
            $join->on("track.schedule_id", "=", "sch.id");
        })
        ->where(function ($on) use($month){
            $on->whereRaw('MONTH(sch.schedule_start) = ? AND YEAR(sch.schedule_start) = ?', [$month, date('Y')]);
        })
        ->get();
        return $db;
    }
}
