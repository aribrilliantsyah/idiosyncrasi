<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laratrust\LaratrustFacade as Laratrust;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Laratrust::hasRole('su')) return $this->suDashboard();
        if (Laratrust::hasRole('admin')) return $this->adminDashboard();
        else return view('errors.403');
    }
    public function suDashboard()
    {
        return view('dashboard.su');
    }
    public function adminDashboard()
    {
        return view('dashboard.admin');
    }
}
