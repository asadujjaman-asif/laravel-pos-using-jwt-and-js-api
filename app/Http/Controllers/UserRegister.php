<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Helper\JWTToken;
use App\Mail\OTPMail;
use Exception;
use Illuminate\Support\Facades\Mail;

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
            User::create([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'password' => $request->password,
                'mobile'=>$request->mobile,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'User Registration Successfully'
            ],200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => 'User Registration Failed ! From Back-End'
            ],200);
        }
        
   }
    public function login(Request $request){
       $user=User::where('email','=',$request->email)
                ->where('password','=',$request->password)
                ->count();
        if($user===1) {
            $token=JWTToken::createTocken($request->email);
            return response()->json([
                'status' => 'success',
                'message' => 'User Login Successfully',
                'token' => $token
            ],200)->cookie('token',$token,60*24*30);;

        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized user'
            ],200);
        }
        
   }
    public function sendOTPCode(Request $request){
        $user=User::where('email',$request->email)
                ->count();
        if($user==1) {
            $otpCode=rand(100000,999999);
            Mail::to($request->email)->send(new OTPMail($otpCode));
            User::where('email',$request->email)->update(['otp'=>$otpCode]);
            return response()->json([
                'status' => 'success',
                'message' => 'We  sent 6 digit code,please check your email.',
            ],200);

        }else{
            return response()->json([
                'status' => 'failed',
                'message' =>"You have entered the email address is not matching in our server.",
            ],200);
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
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid OTP Code',
            ],200);
        }
    }
    public function resetPassword(Request $request){
        try{
            $email=$request->header('email');
            User::where('email',$email)->update(['password'=>$request->password]);
            return response()->json([
                'status' => 'success',
                'message' => 'Password reset Successfully',
            ],200);

        }catch(Exception $e){
            
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized user'
            ],200);
        }
    }
}
