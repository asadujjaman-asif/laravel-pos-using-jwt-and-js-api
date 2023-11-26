<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('frontend.pages.home-page');
    }
    public function productDetails(){
        return view('frontend.pages.product-details');
    }
    public function category(){
        return view('frontend.pages.category-page');
    }
    public function cartList(){
        return view('frontend.pages.cart-list');
    }
    public function checkOut(){
        return view('frontend.pages.checkout-page');
    }
    public function wishlist(){
        return view('frontend.pages.wishlist-page');
    }
    public function customerLogin(){
        return view('frontend.pages.login');
    }
}
