<?php

namespace App\Http\Controllers;

use App\Models\CompanyAbout;
use App\Models\CompanyBanner;
use App\Models\CompanyClient;
use App\Models\Contact;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $banner = CompanyBanner::find(1);
        $about = CompanyAbout::find(1);
        $client = CompanyClient::all();
        $contact = Contact::all();
        return view('website.home', compact('banner', 'about', 'client', 'contact'));
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
}
