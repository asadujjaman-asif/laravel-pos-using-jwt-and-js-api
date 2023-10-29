<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Order;
use App\Http\Requests\StoreOrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;
use Illuminate\Http\Request;
use App\Helper\General;
use App\Helper\Json;
use Exception;

class OrderDetailController extends Controller
{
    
    public function discountById(){
        $qty=5;
        echo $result=General::checkQuantity(4,1,$qty);
        if($qty>$result){
            $msg="Out of stock! Your ordered quantity is {$qty} but available stock quantity is {$result}";
            echo $msg;
        }
        //print_r($result);
       // $info=General::calculateTotalPrice(4,4);
        //echo $info['totalPrice'];
    }
    /**
     * Display a listing of the resource.
     */
    public function showOrder()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createOrder(Request $request)
    {
        try {
            $orderDetail=new OrderDetail();
            $max=OrderDetail::max('id');
            $storeId=$request->store_id;

            $checkQty=General::checkQuantity($request->product_id,$storeId,$request->qty);
            if($request->qty>$checkQty){
                $msg="Out of stock! Your ordered quantity is {$request->qty} but available stock quantity is {$checkQty}";
                return Json::response('failed',$msg,'',200); 
            }
            
            $qty=General::calculateTotalPrice($request->product_id,$storeId,$request->qty);
            $orderDetail->invoice = General::createVoucher($max);
            $orderDetail->vat = General::createVoucher($max);
            $orderDetail->total_price = $qty['totalPrice'];
            $orderDetail->payment_status = $request->payment_status;
            $orderDetail->status = 1;
            $orderDetail->order_date = 0;
            $orderDetail->delivery_date = null;
            $orderDetail->store_id = $request->store_id;
            $orderDetail->customer_id = $request->customer_id;
            $orderDetail->save();

            $order=new Order(); 
            $order->order_id=$orderDetail->id;
            $order->product_id=$request->product_id;
            $order->qty=$request->qty;
            $order->unit_price=$qty['unitPrice'];
            $order->color_id=$request->color_id;
            $order->size_id=$request->size_id;
            $order->save();

            return Json::response('success','Product has been added to your cart.',$cart,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderDetailRequest $request, OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderDetail $orderDetail)
    {
        //
    }
}
