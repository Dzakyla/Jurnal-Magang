<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        
        switch($user->role) {
            case 'magang':
                return view('dashboard.magang');
            case 'admin':
                return view('dashboard.admin');
            case 'super_admin':
                return view('dashboard.super_admin');
            default:
                return view('home');
            }
}
}