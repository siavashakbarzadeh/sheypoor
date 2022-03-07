<?php

namespace App\Http\Controllers\admin;

use App\category;
use App\post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isadmin');
    }

    public function index()
    {
        $posts = post::orderBy('id','desc')->take(6)->get();
        $postCount = post::count();
        $categoryCount = category::count();
        $userCount = User::count();

        return view('admin.index',compact('posts','postCount','categoryCount','userCount'));
    }
}
