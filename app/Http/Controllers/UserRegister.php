<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Helper\JWTToken;
use App\Mail\OTPMail;
use Exception;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Helper\Json;

class UserRegister extends Controller
{
    public function loginView(){
        return view('pages.login.login');
    }
    public function registerView(){
        return view('pages.login.register');
    }
    public function otpView(){
        return view('pages.login.otp');
    }
    public function verifyOTPView(){
        return view('pages.login.verifyOTP');
    }
    public function passwordResetView(){
        return view('pages.login.reset');
    }
    
    public function userRegistration(Request $request){
        try{
           $result= User::create([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'password' => $request->password,
                'mobile'=>$request->mobile,
            ]);
            return Json::response('success','User Registration Successfully',$result,200);
        }catch(Exception $e){
            return Json::response('failed','User Registration Failed ! From Back-End',$e->getMessage(),200);
        }
        
    }
    public function login(Request $request){
      try{
        $user=User::where('email','=',$request->email)
        ->where('password','=',$request->password)
        ->select('id')->first();
        if($user!==null) {
            $token=JWTToken::createTocken($request->email,$user->id);
            return response()->json([
                'status' => 'success',
                'message' => 'User Login Successfully',
                'token' => $token
            ],200)->cookie('token',$token,60*24*30);;

        }else{
            return Json::response('failed','Unauthorized user','error',200);
        }
      }catch(Exception $e){
        return Json::response('failed','Unauthorized user',$e->getMessage(),200);
      }
        
   }
    public function sendOTPCode(Request $request){
        $user=User::where('email',$request->email)
                ->count();
        if($user==1) {
            $otpCode=rand(100000,999999);
            Mail::to($request->email)->send(new OTPMail($otpCode));
            $result=User::where('email',$request->email)->update(['otp'=>$otpCode]);
            $msg='We  sent 6 digit code,please check your email.';
            return Json::response('success',$msg,$result,200);
        }else{
            $msg="You have entered the email address is not matching in our server.";
            return Json::response('failed',$msg,'error',200);
        }
     
    }
    public function verifyOTP(Request $request){
        $user=User::where('email',$request->email)
                    ->where('otp',$request->otp)->count();
        if($user==1) {
            $validityTime=60*20;
            User::where('email',$request->email)->update(['otp'=>0]);
            $token=JWTToken::createTocken($request->email,$validityTime);
            return response()->json([
                'status' => 'success',
                'message' => 'OTP verify Successfully',
                'token' => $token
            ],200)->cookie('token',$token,60*24*30);

        }else{
            return Json::response('failed','Invalid OTP Code','error',200);
        }
    }
    public function resetPassword(Request $request){
        try{
            $email=$request->header('email');
            $result=User::where('email',$email)->update(['password'=>$request->password]);
            return Json::response('success','Password reset Successfully',$result,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
    public function logout(Request $request) {
        $datetime = Carbon::now()->toDateTimeString();
        $currentDate=Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->format('Y-m-d');
        $obj=JWTToken::verifyToken($request->cookie('token'));
        User::where('email',$obj->userIdentity)->update(['lastLogin'=>$currentDate]);
        return redirect('/auth/login')->cookie('token','',-1);
    }
    public function getUserProfile(Request $request){
        try{
            $email=$request->header('email');
            $result=User::where('email',$email)->first();
            return Json::response('success','Password reset Successfully',$result,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
    public function updateUserProfile(Request $request){
        try{
            $obj=User::find($request->header('id'));
            $obj->firstName=$request->firstName;
            $obj->lastName=$request->lastName;
           // $obj->password=$request->password;
            $obj->mobile=$request->mobile;
            $obj->save();
            $msg='User Registration Successfully';
            return Json::response('success',$msg,$obj,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
        
   }
}
