<?php

namespace App\Http\Controllers;

use App\Models\EcCustomer;
use App\Http\Requests\StoreEcCustomerRequest;
use App\Http\Requests\UpdateEcCustomerRequest;
use Exception;
use App\Helper\Json;
use App\Helper\JWTToken;
use App\Mail\OTPMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EcCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function customerLogin(Request $request)
    {
        try {
            $otpCode=rand(100000,999999);
            $template='OTPCode';
            Mail::to($request->email)->send(new OTPMail($otpCode,$template));
            $result=EcCustomer::updateOrCreate(
                ['customer_email'=>$request->email],
                ['customer_email'=>$request->email,'otp'=>$otpCode]
            );    
            $msg='We  sent 6 digit code,please check your email.';
            return Json::response('success',$msg,$result,200);

        }catch(Exception $e){
            $msg="You have entered the email address is not matching in our server.";
            return Json::response('failed',$msg,'error',200);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function verifyLogin(Request $request)
    {
        try{
            $verifyOTP=EcCustomer::where('customer_email',$request->email)->where('otp',$request->otp)->first();
            if($verifyOTP){
               $customer= EcCustomer::findOrFail($verifyOTP->id);
               $customer->otp=0;
               $customer->save();
               $validityTime=60*20;
               $token=JWTToken::createTocken($request->email,$verifyOTP->id,$validityTime);
               $msg='OTP verify Successfully';
               return Json::response('success',$msg,$token,200)->cookie('token',$token,60*24*30);
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
