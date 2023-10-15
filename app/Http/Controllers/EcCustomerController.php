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
            $ec_user_id=$request->headers('user_id');
            $request->merge(['ec_user_id'=>$ec_user_id]);
            $result=EcCustomer::updateOrCreate(
                ['ec_user_id'=>$ec_user_id],
                $request->input()
            );    
            $msg='User profile created successfully.';
            return Json::response('success',$msg,$result,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }

    /**
     * read Customer profile.
     */
    public function readCustomerProfile(Request $request)
    {
        try{
            $ec_user_id=$request->headers('user_id');
            $user=EcCustomer::where('ec_user_id',$ec_user_id)->first();
            if($user){
               return Json::response('success',$user,$user,200);
            }else{
                $msg="You have entered an invalid OTP Or Email.";
                return Json::response('failed',$msg,'error',200);
            }
        }catch(Exception $e) {
            return Json::response('failed','Something Went wrong',$e->getMessage(),200);
        }
    }
}
