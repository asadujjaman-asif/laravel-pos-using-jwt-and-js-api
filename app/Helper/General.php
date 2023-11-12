<?php
namespace app\Helper;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\CartDetail;
use App\Models\OrderDetail;
use App\Models\Cart;
use App\Models\OurCompany;
class General{
    
    public static function fileUpload($file,$user_id,$folder='uploads'){
        $t=time();
        $file_name=$file->getClientOriginalName();
        $img_name="{$user_id}-{$t}-{$file_name}";
        $img_url="{$folder}/{$img_name}";
        $file->move(public_path($folder),$img_name);
        return $img_url;
    }
    public static function crateSlug($item){
        $t=time();
        return Str::slug($item)."-".$t;
    }
    public static function createVoucher($max){
        $initial=$max+1;
        $voucherNumber=str_pad($initial, 6, '0', STR_PAD_LEFT);
        $voucher="NEL-{$voucherNumber}";
        return $voucher;
    }
    public static function checkQuantity($productId,$storeId,$orderQry){
        $initialQty=Product::where('id',$productId)->where('user_id',$storeId)->first();
        $availAbleStock=$initialQty->qty;

        $cartsQty=OrderDetail::with('order')
        ->whereHas('order',function($query) use ($productId){
            $query->where('product_id',$productId);
        })->where('delivery_status','!=',0)->get();

        $qty=0;
        foreach($cartsQty as $key => $value){
            $qty+=$value->order->qty;
        }

        $cartQty=Cart::where("product_id",$productId)->sum('qty'); 
        $saleQuantity=$qty+$cartQty;
        $currentQty=$availAbleStock-$saleQuantity;
        return $currentQty;
    }
    public static function calculateTotalPrice($productId,$storeId,$qty=1){
        $product=Product::where('id',$productId)->where('user_id',$storeId)->first();
        return [
            'unitPrice' => $product->salePrice,
            'totalPrice' => $product->salePrice*$qty,
        ];
    }
    public static function calculateVatPrice($totalAmount,$companyId){
       $company=OurCompany::where('company_id',$companyId)->first();
       return  ($totalAmount*$company->vat)/100;
    }
}