<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Str;
use App\Helper\General;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sliderList()
    {
        return view('pages.dashboard.slider-page');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getSlider(Request $request)
    {
        $id=$request->header('id');
        return Slider::where("user_id",$id)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createSlider(Request $request)
    {
        try {
            $id=$request->header('id');
            $img=$request->file('image');
            $product=new Slider();
            $product->product_id = $request->product_id;
            $product->title = $request->title;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->user_id = $id;
            $product->image = General::fileUpload($img,$id,'sliders');
            $product->save();
            return response()->json([
                'status' => 'success',
                'message' =>'Slider has been saved successfully'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' =>'Unauthorized user',
                'error' => $e->getMessage()
            ], 200);
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function sliderById(Request $request)
    {
        $user_id=$request->header('id');
        $result=Slider::where('user_id',$user_id)->where('id',$request->slider_id)->first();
        return $result;
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateProduct(Request $request)
    {
        try {
            $max=Slider::max('id');
            $id=$request->header('id');
            $product=Slider::findOrFail($request->product_id);
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->brand_id = $request->brand_id;
            $product->unit_id = $request->unit_id;
            $product->productName = $request->productName;
            $product->purchasePrice = $request->purchasePrice;
            $product->salePrice = $request->salePrice;
            $product->qty = $request->qty;
            $product->shortDescription = $request->productDescription;
            $product->slug =General::crateSlug($request->productName);
            $product->user_id = $id;
            $product->SKU = Str::of($request->productName)->upper()->substr(0,3)."-".rand(10000,99999);
            if($request->hasFile('image')){
                $img=$request->file('image');
                $product->image = General::fileUpload($img,$id);
                File::delete($request->file_path);
            }
            $product->save();
            return response()->json([
                'status' => 'success',
                'message' =>'Product has been updated successfully'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' =>'Unauthorized user',
                'error' => $e->getMessage()
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function deleteSlider(Request $request)
    {
        try {
            $user_id=$request->header('id');
            $filePath=$request->file_path;
            Slider::where('user_id',$user_id)->where('id',$request->slider_id)->delete();
            File::delete($filePath);
            return response()->json([
                'status' => 'success',
                'message' =>'Slider has been deleted successfully'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' =>'Unauthorized user'
            ], 200);
        }
    }
}
