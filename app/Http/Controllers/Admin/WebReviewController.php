<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WebReviewController extends Controller
{
    public function index()
    {
        return view('pages.company.review');
    }

    public function dt(Request $request)
    {
        $model = Review::query()->get();
        return DataTables::of($model)
            ->editColumn('is_show', function ($model){
                return ($model->is_show == '1') ? 'Ditampilkan' : 'Tidak ditampilkan';
            })
            ->addColumn('action', function ($model){
                return view('pages.company.components.btn_show_or_not', compact('model'));
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function update($id, Request $request)
    {
        $model = Review::find($id);

        $model->is_show = $request->is_show;

        $model->save();

        return thisSuccess('Update successfully');
    }
}
