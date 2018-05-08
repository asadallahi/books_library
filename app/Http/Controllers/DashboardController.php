<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('authCheck');
    }
    public function index()
    {
        if (!isset($_COOKIE['username']))
        {
            return redirect('/register');
        }
        return view('dashboard');
    }
}
