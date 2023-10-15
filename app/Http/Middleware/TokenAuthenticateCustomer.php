<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Helper\JWTToken;

class TokenAuthenticateCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token=$request->cookie('user_token');
        $result=JWTToken::verifyToken($token);
        if($result=="unauthorized"){
            return redirect('/');
        }else{
            $request->headers->set('user_email',$result->userIdentity);
            $request->headers->set('user_id',$result->userId);
            return $next($request);
        }
    }
}
