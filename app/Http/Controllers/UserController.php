<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IlluminatSupport\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function comments()
    {
        return view('user.comments');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function profilePost(Request $request)
    {
        $user = Auth::user();

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();

        return back();
    }

}
