<?php

namespace App\Http\Controllers;

use App\Models\ProductReview;
use App\Http\Requests\StoreProductReviewRequest;
use App\Http\Requests\UpdateProductReviewRequest;
use Illuminate\Http\Request;
use App\Helper\Json;
use Exception;

class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function createReview(Request $request)
    {
        try{
            $ec_user_id=$request->headers('user_id');
            $customer=ProductReview::where('customer_id',$ec_user_id)->first();
            $request->merge(['customer_id'=>$ec_user_id]);
            if($customer){
                $result=ProductReview::updateOrCreate(
                    ['customer_id'=>$ec_user_id,'product_id'=>$request->product_id],
                    $request->input()
                );    
                $msg='Product review created successfully.';
                return Json::response('success',$msg,$result,200);
            }else{
                $msg="Customer Profile not exists.";
                return Json::response('failed',$msg,'error',200);
            }
        }catch(Exception $e) {
            return Json::response('failed','Something Went wrong',$e->getMessage(),200);
        }
    }
   
}
