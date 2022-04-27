<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class WebBannerController extends Controller
{
    public function index()
    {
        return view('pages.banner.index');
    }

    public function dt(Request $request)
    {
        $model = DB::table('banner_image')->get();
        return DataTables::of($model)
            ->addIndexColumn()
            ->make(true);
    }

    public function detail()
    {
        $model = CompanyBanner::find(1);
        
        return thisSuccess(1, $model);
    }

    public function store(Request $request)
    {
        $request->validate([
            'hero' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        DB::beginTransaction();
        try {
            
            if ($img = $request->file('hero')) {
                $imgName = time() . '.' . $img->getClientOriginalExtension();
                $img->move(public_path('files/banner'), $imgName);
    
                DB::table('banner_image')->insert([
                    'image' => $imgName
                ]);
            }
            
            DB::commit();
            return thisSuccess('Data saved successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return thisError('Data failed to save');
        }
    }

    public function detailimage($id)
    {
        $model = DB::table('banner_image')->find($id);
        if ($model) {
            return thisSuccess(1, $model);
        }

        return thisSuccess('Not Found');
    }

    public function updateimage(Request $request)
    {
        $request->validate([
            'hero' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        DB::beginTransaction();
        try {
            if ($img = $request->file('hero')) {
                $imgName = time() . '.' . $img->getClientOriginalExtension();
                $img->move(public_path('files/banner'), $imgName);
                
                $banner = DB::table('banner_image')->where('id',$request->id)->update([
                    'image' => $imgName
                ]);
            }
            
            DB::commit();
            return thisSuccess('Data saved successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return thisError('Data failed to save');
        }
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            // 'img' => 'image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $model = CompanyBanner::find(1);
        
        $model->title = $request->title;
        $model->desc = $request->desc;
        $model->yt_link = $request->yt_link;
        // if ($img = $request->file('hero')) {
        //     $imgName = time() . '.' . $img->getClientOriginalExtension();
        //     $img->move(public_path('files/banner'), $imgName);

        //     $model->img = $imgName;
        // }

        $model->save();
        
        return thisSuccess('Data updated successfully');
    }

    public function destroy($id)
    {
        $model = DB::table('banner_image')->where('id',$id)->delete();
        
        return thisSuccess('Data deleted successfully');
    }
}
