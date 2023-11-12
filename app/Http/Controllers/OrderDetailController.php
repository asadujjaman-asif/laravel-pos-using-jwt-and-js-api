<?php

namespace App\Http\Controllers;

use App\Models\EcCustomer;
use App\Models\EcCustomerShipping;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Cart;
use App\Http\Requests\StoreOrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;
use Illuminate\Http\Request;
use App\Helper\General;
use App\Helper\Json;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Helper\SSLCommerz;

class OrderDetailController extends Controller
{
    
    public function discountById(){
        $qty=5;
       // $result=General::calculateVatPrice(2000,1);
       // print_r($result);
       echo Carbon::now()->format('Y-m-d');
       
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
        DB::beginTransaction();
        try {
            $user_id=$request->header('user_id');
            $user_email=$request->header('user_email');
            $orderDetail=new OrderDetail();
            $max=OrderDetail::max('id');
            $storeId=$request->store_id;
            $tran_id=uniqid();

            $ecCustomer=EcCustomer::where('ec_user_id',$user_id)->first();
            $ecCustomerShipping=EcCustomerShipping::where('ec_user_id',$user_id)->first();
            $cus_details="Name:$ecCustomer->customer_name,Address:$ecCustomer->customer_add,City:$ecCustomer->customer_city,Phone: $ecCustomer->customer_phone";
            $ship_details="Name:$ecCustomerShipping->shipp_name,Address:$ecCustomerShipping->shipp_add ,City:$ecCustomerShipping->shipp_city ,Phone: $ecCustomerShipping->shipp_phone";
            
            $checkQty=General::checkQuantity($request->product_id,$storeId,$request->qty);
            if($request->qty>$checkQty){
                $msg="Out of stock! Your ordered quantity is {$request->qty} but available stock quantity is {$checkQty}";
                return Json::response('failed',$msg,'',200); 
            }

            $totalAmount=0;
            $cartList=Cart::where('customer_id','=',$user_id)->get();
            foreach ($cartList as $cartItem) {
                $totalAmount=$totalAmount+$cartItem->unit_price;
            }
            $vat=General::calculateVatPrice($totalAmount,$storeId);
            $payable=$totalAmount+$vat;
            $qty=General::calculateTotalPrice($request->product_id,$storeId,$request->qty);
            $orderDetail->invoice = General::createVoucher($max);
            $orderDetail->vat = $vat;
            $orderDetail->total_price = $totalAmount;
            $orderDetail->payable = $payable;
            $orderDetail->delivery_status = "Pending";
            $orderDetail->payment_status = "Pending";
            $orderDetail->tran_id = $tran_id;
            $orderDetail->cus_details = $cus_details;
            $orderDetail->ship_details = $ship_details;
            $orderDetail->order_date = Carbon::now()->format('Y-m-d');
            $orderDetail->delivery_date = null;
            $orderDetail->customer_type = "EcCustomer";
            $orderDetail->store_id = $request->store_id;
            $orderDetail->customer_id = 0;
            $orderDetail->ec_customer_id = $request->customer_id;
            $orderDetail->save();

            $order=new Order(); 
            foreach ($cartList as $EachProduct) {
                $order->order_id=$orderDetail->id;
                $order->product_id=$request->product_id;
                $order->qty=$request->qty;
                $order->unit_price=$qty['unitPrice'];
                $order->color_id=$request->color_id;
                $order->size_id=$request->size_id;
                $order->save();
            }
            $paymentMethod=SSLCommerz::InitiatePayment($ecCustomer,$ecCustomerShipping,$payable,$tran_id,$user_email);
            DB::commit();
            return Json::response('success','Product has been added to your cart.',array(['paymentMethod'=>$paymentMethod,'payable'=>$payable,'vat'=>$vat,'total'=>$totalAmount]),200);
        }catch(Exception $e){
            DB::rollBack();
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
    function orderList(Request $request){
        $user_id=$request->header('id');
        return OrderDetail::where('user_id',$user_id)->get();
    }

    function orderDetails(Request $request){
        $user_id=$request->header('id');
        $invoice_id=$request->invoice_id;
        return Order::where(['user_id'=>$user_id,'invoice_id'=>$invoice_id])->with('product')->get();
    }


    function PaymentSuccess(Request $request){
        return SSLCommerz::InitiateSuccess($request->query('tran_id'));
    }


    function PaymentCancel(Request $request){
        return SSLCommerz::InitiateCancel($request->query('tran_id'));
    }

    function PaymentFail(Request $request){
        return SSLCommerz::InitiateFail($request->query('tran_id'));
    }

    function PaymentIPN(Request $request){
        return SSLCommerz::InitiateIPN($request->input('tran_id'),$request->input('status'),$request->input('val_id'));
    }
}
