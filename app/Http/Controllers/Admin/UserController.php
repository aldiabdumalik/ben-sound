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
        return view('pages.user.index');
    }

    public function dt(Request $request)
    {
        $model = User::query()->get();
        return DataTables::of($model)
            ->addColumn('role', function ($model){
                return $model->getRoleNames()[0];
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function detail($id)
    {
        $model = User::find($id);

        if ($model) {
            $roles = $model->getRoleNames();

            return thisSuccess(1, $roles);
        }

        return thisSuccess('Not Found', 0);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->assignRole($request->role);

        return thisSuccess('User registered as ' . $request->role);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $model = User::find($id);
        $roles = $model->getRoleNames();

        $model->name = $request->name;
        $model->email = $request->email;
        $model->password = bcrypt($request->password);

        $model->removeRole($roles[0]);
        $model->assignRole($request->role);

        return thisSuccess('User updated as ' . $request->role);
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
