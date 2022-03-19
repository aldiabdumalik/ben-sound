<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyClient;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WebClientController extends Controller
{
    public function index()
    {
        return view('pages.client.index');
    }

    public function detail($id)
    {
        $model = CompanyClient::find($id);
        if ($model) {
            return thisSuccess(1, $model);
        }

        return thisSuccess('Not Found');
    }

    public function dt(Request $request)
    {
        $model = CompanyClient::query()->get();
        return DataTables::of($model)
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $insert = [];

        if ($img = $request->file('image')) {
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('files/client'), $imgName);

            $insert['image'] = $imgName;
        }

        $insert['client_name'] = $request->client_name;

        CompanyClient::create($insert);

        return thisSuccess('Data saved successfully');
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'client_name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $model = CompanyClient::find($request->id);
        
        $model->client_name = $request->client_name;

        if ($img = $request->file('image')) {
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('files/client'), $imgName);

            $model->image = $imgName;
        }

        $model->save();

        return thisSuccess('Data updated successfully');
    }
    
    public function destroy($id)
    {
        $model = CompanyClient::find($id);
        $model->delete();
        
        return thisSuccess('Data deleted successfully');
    }
}
