<?php

namespace App\Helper;

use App\Models\OrderDetail as Invoice;
use App\Models\SslcommerzAccount;
use Exception;
use Illuminate\Support\Facades\Http;

class SSLCommerz
{

   static function  InitiatePayment($Profile,$shipping,$payable,$tran_id,$user_email): array
   {
      try{
          $ssl= SslcommerzAccount::first();
          $response = Http::asForm()->post($ssl->init_url,[
              "store_id"=>$ssl->store_id,
              "store_passwd"=>$ssl->store_passwd,
              "total_amount"=>$payable,
              "currency"=>$ssl->currency,
              "tran_id"=>$tran_id,
              "success_url"=>"$ssl->success_url?tran_id=$tran_id",
              "fail_url"=>"$ssl->fail_url?tran_id=$tran_id",
              "cancel_url"=>"$ssl->cancel_url?tran_id=$tran_id",
              "ipn_url"=>$ssl->ipn_url,
              "cus_name"=>$Profile->customer_name,
              "cus_email"=>$user_email,
              "cus_add1"=>$Profile->customer_add,
              "cus_add2"=>$Profile->customer_add,
              "cus_city"=>$Profile->customer_city,
              "cus_state"=>$Profile->customer_city,
              "cus_postcode"=>"1200",
              "cus_country"=>"Bangladesh",
              "cus_phone"=>$Profile->customer_phone,
              "cus_fax"=>$Profile->customer_phone,
              "shipping_method"=>"YES",
              "ship_name"=>$shipping->shipp_name,
              "ship_add1"=>$shipping->shipp_add,
              "ship_add2"=>$shipping->shipp_add,
              "ship_city"=>$shipping->shipp_city,
              "ship_state"=>$shipping->shipp_city,
              "ship_country"=>"Bangladesh",
              "ship_postcode"=>"12000",
              "product_name"=>"Apple Shop Product",
              "product_category"=>"Apple Shop Category",
              "product_profile"=>"Apple Shop Profile",
              "product_amount"=>$payable,
          ]);
          return $response->json('desc');
      }
      catch (Exception $e){
          return $ssl;
      }

    }

    static function InitiateSuccess($tran_id):int{
        Invoice::where(['tran_id'=>$tran_id,'val_id'=>0])->update(['payment_status'=>'Success']);
        return 1;
    }

    static function InitiateFail($tran_id):int{
       Invoice::where(['tran_id'=>$tran_id,'val_id'=>0])->update(['payment_status'=>'Fail']);
       return 1;
    }

    static function InitiateCancel($tran_id):int{
        Invoice::where(['tran_id'=>$tran_id,'val_id'=>0])->update(['payment_status'=>'Cancel']);
        return 1;
    }

    static function InitiateIPN($tran_id,$status,$val_id):int{
        Invoice::where(['tran_id'=>$tran_id,'val_id'=>0])->update(['payment_status'=>$status,'val_id'=>$val_id]);
        return 1;
    }
}
