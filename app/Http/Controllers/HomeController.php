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
}
