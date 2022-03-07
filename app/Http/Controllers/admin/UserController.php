<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user/index',compact('users'));
    }

    public function store(UserRequest $request)
    {

         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect('admin/user');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
