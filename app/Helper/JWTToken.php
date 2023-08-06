<?php
namespace app\Helper;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Exception;

class JWTToken {
    public static function createTocken($userEmail,$validityTime=3600){
        $key=env('JWT_KEY');
        $payload = [
            'iss' => 'http://neelghuri.com',
            'aud' => 'http://neelghuri.com',
            'iat' => time(),
            'exp' => time()+$validityTime,
            'userIdentity' => $userEmail
        ];
        return JWT::encode($payload, $key, 'HS256');

    }
    public static function verifyToken($token){
        try{
            $key=env('JWT_KEY');
            $decoded = JWT::decode($token, new Key($key, 'HS256'));
            return $decoded->userIdentity;
        }catch(Exception $e){
            return "unauthorized";
        }
    }
}