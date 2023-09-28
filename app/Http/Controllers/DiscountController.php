<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use Illuminate\Http\Request;
use App\Helper\Json;
use Exception;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function productDiscountById(Request $request)
    {
        $id=$request->header('id');
        $discount=Discount::where('product_id',$request->product_id)->where('user_id',$id)->first();
        $discount['startDate']=Carbon::createFromFormat('Y-m-d', $discount->startDate)->format('d-m-Y');
        $discount['endDate']=Carbon::createFromFormat('Y-m-d', $discount->endDate)->format('d-m-Y');
        return Json::response('success','Discount list',$discount,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function updateProductDiscount(Request $request)
    {
        try {
            $id=$request->header('id');
            $discountByid=Discount::where('product_id',$request->product_id)->where('user_id',$id)->first();
            if($discountByid){
                $discount=Discount::findOrFail($discountByid->id);
                $discount->startDate = Carbon::createFromFormat('d-m-Y', $request->startDate)->format('Y-m-d');
                $discount->endDate = Carbon::createFromFormat('d-m-Y', $request->endDate)->format('Y-m-d');
                $discount->discount = $request->discount;
                $discount->product_id = $request->product_id;
                $discount->user_id = $id;
                $discount->save();
            }else{
                $discount=new Discount();
                $discount->startDate = Carbon::createFromFormat('d-m-Y', $request->startDate)->format('Y-m-d');
                $discount->endDate = Carbon::createFromFormat('d-m-Y', $request->endDate)->format('Y-m-d');
                $discount->discount = $request->discount;
                $discount->product_id = $request->product_id;
                $discount->user_id = $id;
                $discount->save();
            }
            return Json::response('success','Discount has been updated successfully',$discount,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
}
