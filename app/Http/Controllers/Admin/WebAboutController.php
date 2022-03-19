<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyAbout;
use Illuminate\Http\Request;

class WebAboutController extends Controller
{
    public function index()
    {
        return view('pages.about.index');
    }

    public function detail()
    {
        $model = CompanyAbout::find(1);
        
        return thisSuccess(1, $model);
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'about' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $model = CompanyAbout::find(1);
        
        $model->about = $request->about;

        if ($img = $request->file('image')) {
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('files/about'), $imgName);

            $model->image = $imgName;
        }

        $model->save();
        
        return thisSuccess('Data updated successfully');
    }
}
