<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\Contact;
use Illuminate\Http\Request;

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
            'icon' => 'image|mimes:jpeg,png,jpg|max:5000',
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
        $model->facebook = $request->facebook;
        $model->instagram = $request->instagram;
        $model->lingkedin = $request->lingkedin;
        $model->youtube = $request->youtube;
        $model->whatsapp = $request->whatsapp;

        $model->save();

        return thisSuccess('Data updated successfully');
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
