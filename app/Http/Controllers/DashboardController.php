<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function AdminDashboard(){
        //notify()->success('Laravel Notify is awesome!');
        emotify('success', 'You are awesome, your data was successfully created');
        smilify('success', 'You are successfully reconnected');
        connectify('success', 'Connection Found', 'Success Message Here');
        notify()->success('You are awesome, your data was successfully created ⚡️') or notify()->success('Welcome to Laravel Notify ⚡️', 'My custom title');
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
