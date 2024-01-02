<?php

namespace App\Http\Controllers;

use App\Models\EcUser;
use App\Http\Requests\StoreEcUserRequest;
use App\Http\Requests\UpdateEcUserRequest;
use Exception;
use App\Helper\Json;
use App\Helper\JWTToken;
use App\Mail\OTPMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EcUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function customerLogin(Request $request)
    {
        try {
            $otpCode=rand(100000,999999);
            $template='OTPCode';
            //Mail::to($request->email)->send(new OTPMail($otpCode,$template));
            $emailResult=EcUser::where('email',$request->email)->first();
            if($emailResult) {
                EcUser::where('email',$emailResult->email)->update([
                    'otp'=>$otpCode
                ]);
            }else{
                $ecUser=new EcUser();
                $ecUser->email=$request->email;
                $ecUser->otp=$otpCode;
                $ecUser->save();
            }; 
            $msg='We  sent 6 digit code,please check your email.';
            return Json::response('success',$msg,$otpCode,200);
        }catch(Exception $e){
            $msg="You have entered the email address is not matching in our server.";
            return Json::response('failed',$e->getMessage(),'error',200);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function verifyLogin(Request $request)
    {
        try{
            $verifyOTP=EcUser::where('otp',$request->otp)->first();
            if($verifyOTP){
               $customer= EcUser::findOrFail($verifyOTP->id);
               $customer->otp=0;
               $customer->save();
               $validityTime=60*20;
               $token=JWTToken::createTocken($request->email,$verifyOTP->id,$validityTime);
               $msg='OTP verify Successfully';
               return Json::response('success',$msg,$token,200)->cookie('user_token',$token,60*24*30);
            }else{
                $msg="You have entered an invalid OTP Or Email.";
                return Json::response('failed',$msg,'error',200);
            }
        }catch(Exception $e) {
            return Json::response('failed','Something Went wrong',$e->getMessage(),200);
        }
    }

    /**
     * Log out.
     */
    public function logOut(Request $request)
    {
        try{
            return redirect('/')->cookie('token','',-1);
        }catch(Exception $e){
            return Json::response('failed','Something Went wrong',$e->getMessage(),200);
        }
    }
}
