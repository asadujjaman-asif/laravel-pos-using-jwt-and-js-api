<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use App\Http\Requests\StoreWishListRequest;
use App\Http\Requests\UpdateWishListRequest;
use Illuminate\Http\Request;
use App\Helper\Json;
use Exception;

class WishListController extends Controller
{
    public function showWishList(Request $request)
    {
        try{
            $ec_user_id=$request->headers('user_id');
            $wishList=WishList::where('customer_id',$ec_user_id)->with('product')->get();
        }catch(Exception $e) {
            return Json::response('failed','Something Went wrong',$e->getMessage(),200);
        }
    }
    public function createWishList(Request $request)
    {
        try{
            $ec_user_id=$request->headers('user_id');
            $wishList=WishList::where('customer_id',$ec_user_id)->first();
            if($wishList){
                $result=WishList::updateOrCreate(
                    ['customer_id'=>$ec_user_id,'product_id'=>$request->product_id,'store_id'=>$request->store_id],
                    ['customer_id'=>$ec_user_id,'product_id'=>$request->product_id,'store_id'=>$request->store_id],
                );    
                $msg='Product wish listed successfully.';
                return Json::response('success',$msg,$result,200);
            }else{
                $msg="Customer Profile not exists.";
                return Json::response('failed',$msg,'error',200);
            }
        }catch(Exception $e) {
            return Json::response('failed','Something Went wrong',$e->getMessage(),200);
        }
    }
    public function removeWishList(Request $request)
    {
        try{
            $ec_user_id=$request->headers('user_id');
            $wishList=WishList::where('customer_id',$ec_user_id)->where('product_id',$request->product_id)->delete();
        }catch(Exception $e) {
            return Json::response('failed','Something Went wrong',$e->getMessage(),200);
        }
    }
}
