<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{
    public function index()
    {
        return view('pages.company.index');
    }

    public function detail()
    {
        $model = CompanyProfile::find(1);

        return thisSuccess(1, $model);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg|max:5000',
            'icon' => 'image|mimes:jpeg,png,jpg,ico|max:5000',
        ]);

        $model = CompanyProfile::find(1);

        if ($logo = $request->file('logo')) {
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('files/logo'), $logoName);

            $model->logo = $logoName;
        }

        if ($icon = $request->file('icon')) {
            $iconName = time() . '.' . $icon->getClientOriginalExtension();
            $icon->move(public_path('files/logo'), $iconName);

            $model->icon = $iconName;
        }

        $model->name = $request->name;
        $model->address = $request->address;
        $model->facebook = $request->fb;
        $model->instagram = $request->ig;
        $model->linkedin = $request->linkedin;
        $model->youtube = $request->yt;
        $model->whatsapp = $request->whatsapp;

        $model->save();

        return thisSuccess('Data updated successfully');
    }

    public function indexContact()
    {
        return view('pages.company.contact');
    }

    public function detailContact($id)
    {
        $model = Contact::find($id);
        if ($model) {
            return thisSuccess(1, $model);
        }

        return thisSuccess('Not Found');
    }

    public function dt(Request $request)
    {
        $model = Contact::query()->get();
        return DataTables::of($model)
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'value' => 'required',
        ]);

        Contact::create([
            'name' => $request->name,
            'value' => $request->value,
        ]);

        return thisSuccess('Data saved successfully');
    }

    public function updateContact($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'value' => 'required',
        ]);

        $model = Contact::find($id);
        
        $model->name = $request->name;
        $model->value = $request->value;

        $model->save();

        return thisSuccess('Data updated successfully');
    }
    
    public function destroy($id)
    {
        $model = Contact::find($id);
        $model->delete();
        
        return thisSuccess('Data deleted successfully');
    }
}
