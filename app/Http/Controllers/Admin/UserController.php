<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.track.index');
    }

    public function dt(Request $request)
    {
        $model = User::query()->orderBy('schedule_start')->get();
        return DataTables::of($model)
            ->addIndexColumn()
            ->make(true);
    }

    public function detail($id)
    {
        $model = User::find($id);

        if ($model) {
            return thisSuccess(1, $model);
        }

        return thisSuccess('Not Found', 0);
    }

    public function destroy($id)
    {
        try {
            $model = User::find($id);
            // $model->track->delete();
            $model->delete();

            return thisSuccess('Data deleted successfully!');
        } catch (Exception $e) {
            return thisError("Failed to delete because : ". $e->getMessage());
        } 
    }
}
