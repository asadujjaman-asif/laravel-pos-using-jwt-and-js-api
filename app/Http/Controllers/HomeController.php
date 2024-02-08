<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\SubCategory;
use Exception;
use App\Helper\Json;
use App\Models\ColorWiseSize;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\MultiImage;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function home(){
        notify()->success(__('Role has been changed.'));
       // return redirect("/checkout");
        return view('frontend.pages.home-page');
    }
    public function productDetails($slug){
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
    public function about(){
        return view('frontend.pages.about-page');
    }
    public function itemCategory(){
        try {
            $category=Category::with('sub_categories')->get();
            return Json::response('success','Category list',$category,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
    public function itemBrand(Request $request){
        try {
            $brandList=Brand::all();
            return Json::response('success','Brand List',$brandList,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
    public function getSlider(Request $request){
        try {
            $sliderList=Slider::with('product')->latest('id')->get();
            return Json::response('success','Slider List',$sliderList,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
    public function getPopularCategory(){
        try {
            $subCat=SubCategory::where('status',1)->latest('id')->limit(6)->get();
            return Json::response('success','Popular Category',$subCat,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
    public function getNewArrival(){
        try {
            $result=SubCategory::with('product')->where('status',2)->latest('id')->limit(6)->get();
            $allItems=[];
            foreach($result as $key => $val){
                foreach($val->product as $key2=> $val2){
                    if($key2==0){
                        $result[$key]['new_items']=$val2;
                    }
                    $val->product[$key2]['colors']=ColorWiseSize::with('color')->where('product_id',$val2->id)->get();
                    $val->product[$key2]['ratings']=ProductReview::where('product_id',$val2->id)->avg('rating'); 
                    $val->product[$key2]['votes']=ProductReview::where('product_id',$val2->id)->count('customer_id'); 
                }
            }
           return Json::response('success','New Arrival',$result,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
    public function getProductById($slug){
        $results = Product::where("slug",$slug)->first();
        $results["colors"]=ColorWiseSize::with('color')->where('product_id',$results->id)->get();
        $results['ratings']=ProductReview::where('product_id',$results->id)->avg('rating'); 
        $results['votes']=ProductReview::where('product_id',$results->id)->count('customer_id');
        $results['shortImages']=MultiImage::where('product_id',$results->id)->first();
        $results["sizes"]=ColorWiseSize::with('size')->where('product_id',$results->id)->get();
        return Json::response('success','Product by id',$results,200);
    }
}
