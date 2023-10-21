<?php
namespace app\Helper;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\CartDetail;
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
        $availAbleStock=$initialQty->qty+$orderQry;

        $cartsQty=CartDetail::with('cart')
        ->whereHas('cart',function($query) use ($productId){
            $query->where('product_id',$productId);
        })->where('status','!=',0)->get();
        $qty=0;
        foreach($cartsQty as $key => $value){
            $qty+=$value->cart->qty;
        }
        $currentQty=$availAbleStock-$qty;
        return $currentQty;
    }
    public static function calculateTotalPrice($productId,$qty=1){
        $product=Product::where('id',$productId)->where('id',$productId)->first();
        return [
            'unitPrice' => $product->salePrice,
            'totalPrice' => $product->salePrice*$qty,
        ];
    }
}