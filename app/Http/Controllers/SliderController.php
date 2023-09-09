<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Str;
use App\Helper\General;
use App\Helper\Json;
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
        $data=Slider::where("user_id",$id)->get();
        return Json::response('success','Slider result',$data,200);
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
            $msg='Slider has been created successfully';
            return Json::response('success',$msg,$product,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
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
    public function updateSlider(Request $request)
    {
        try {
            $max=Slider::max('id');
            $id=$request->header('id');
            $slider=Slider::where('user_id',$id)->where('id',$request->slider_id)->first();
            $slider->product_id = $request->product_id;
            $slider->title = $request->title;
            $slider->price = $request->price;
            $slider->description = $request->description;
            if($request->hasFile('image')){
                $img=$request->file('image');
                $slider->image = General::fileUpload($img,$id,'sliders');
                File::delete($request->file_path);
            }
            $slider->save();
            $msg='Slider has been updated successfully';
            return Json::response('success',$msg,$slider,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
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
            $obj=Slider::where('user_id',$user_id)->where('id',$request->slider_id)->delete();
            File::delete($filePath);
            return response()->json([
                'status' => 'success',
                'message' =>'Slider has been deleted successfully'
            ], 200);
            return Json::response('success','Slider has been deleted successfully',$obj,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
}
