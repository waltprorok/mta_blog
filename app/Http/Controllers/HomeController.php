<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->admin == true) {
            return redirect(route('adminDashboard'));
        } elseif (Auth::user()->author == true) {
            return redirect(route('authorDashboard'));
        } else {
            return redirect(route('userDashboard'));
        }
    }
}
