<?php
namespace app\Helper;
use Illuminate\Http\JsonResponse;
class Json{
    public static function response($msg,$data,$statusCode='200'){
       return response()->json(['msg'=>$msg,'data'=>$data],$statusCode);
    }
}