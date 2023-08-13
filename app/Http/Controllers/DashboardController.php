<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function AdminDashboard(){
        return view('pages.dashboard.home');
    }
    public function userProfile(){
        return view('pages.dashboard.userProfile');
    }
    public function getLastLogin(Request $request){
        $id=$request->header('id');
        $result=User::find($id);
        $currentDate=Carbon::createFromFormat('Y-m-d', $result->lastLogin)->format('d M Y');
        return $currentDate;
    }
}
