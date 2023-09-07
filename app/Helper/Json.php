<?php
namespace app\Helper;
use Illuminate\Http\JsonResponse;
class Json{
    public static function response($status,$msg,$data,$statusCode='200'){
       return response()->json(['status'=>$status,'msg'=>$msg,'data'=>$data],$statusCode);
    }
}