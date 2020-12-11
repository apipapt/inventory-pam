<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if(\Auth::user()->hasRole('administrator')){
            return redirect('/administrator');
        }

        if(\Auth::user()->hasRole('admin')){
            return redirect('/admin');
        }

        if(\Auth::user()->hasRole('checker')){
            return redirect('/checker');
        }

        return view('dashboard');
    }
}
