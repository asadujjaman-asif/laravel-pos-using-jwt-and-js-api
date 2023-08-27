<?php
namespace app\Helper;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;

class JWTToken {
    public static $str = "1231231aDSwdsghgnTngkhtYXNjYXNjYXM";
    public static function createTocken($userEmail,$userId,$validityTime=3600){
        $key=JWTToken::$str;//env('JWT_KEY');
        $payload = [
            'iss' => 'http://neelghuri.com',
            'aud' => 'http://neelghuri.com',
            'iat' => time(),
            'exp' => time()+$validityTime,
            'userIdentity' => $userEmail,
            'userId' => $userId,
        ];
        return JWT::encode($payload, $key, 'HS256');

    }
    public static function createTokenForSetPassword($userEmail,$validityTime=600){
        $key=JWTToken::$str;//env('JWT_KEY');
        $payload = [
            'iss' => 'http://neelghuri.com',
            'aud' => 'http://neelghuri.com',
            'iat' => time(),
            'exp' => time()+$validityTime,
            'userIdentity' => $userEmail,
            'userId' => "0",
        ];
        return JWT::encode($payload, $key, 'HS256');
    }
    public static function verifyToken($token){
        try{
            $key=JWTToken::$str;//env('JWT_KEY');
            if($token==null){
                return "unauthorized";
            }else{
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                return $decoded;
            }
            
        }catch(Exception $e){
            return "unauthorized";
        }
    }
}