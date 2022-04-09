<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyBanner;
use Illuminate\Http\Request;

class WebBannerController extends Controller
{
    public function index()
    {
        return view('pages.banner.index');
    }

    public function detail()
    {
        $model = CompanyBanner::find(1);
        
        return thisSuccess(1, $model);
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $model = CompanyBanner::find(1);
        
        $model->title = $request->title;
        $model->desc = $request->desc;
        $model->yt_link = $request->yt_link;
        if ($img = $request->file('hero')) {
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('files/banner'), $imgName);

            $model->img = $imgName;
        }

        $model->save();
        
        return thisSuccess('Data updated successfully');
    }
}
