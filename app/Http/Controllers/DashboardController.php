<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function AdminDashboard(){
        return view('pages.dashboard.home');
    }
}
