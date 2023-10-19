<?php
namespace app\Helper;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
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
}