<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WebContactController extends Controller
{
    public function index()
    {
        return view('pages.contact.index');
    }

    public function dt(Request $request)
    {
        $model = ContactMessage::query()->get();
        return DataTables::of($model)
            ->addColumn('date', function ($model){
                return date('d/m/Y', strtotime($model->created_at));
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function detail($id)
    {
        $model = ContactMessage::find($id);

        return thisSuccess(1, $model);
    }

    public function store(Request $request)
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
