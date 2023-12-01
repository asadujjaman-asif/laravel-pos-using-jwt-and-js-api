<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Exception;
use App\Helper\Json;

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
    public function itemCategory(){
        try {
            $category=Category::with('sub_categories')->get();
            return Json::response('success','Category has been created successfully',$category,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
}
