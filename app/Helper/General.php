<?php
namespace app\Helper;
use Illuminate\Support\Facades\File;
class General{
    public static function fileUpload($file,$user_id){
        $t=time();
        $file_name=$file->getClientOriginalName();
        $img_name="{$user_id}-{$t}-{$file_name}";
        $img_url="uploads/{$img_name}";
        $file->move(public_path('uploads'),$img_name);
        return $img_url;
    }
}