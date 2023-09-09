<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;
use App\Helper\Json;
use App\Helper\General;
use Exception;
use Illuminate\Http\Request;

class ColorController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function colorList()
    {
        return view('pages.dashboard.color-page');
    }

    public function getColor(Request $request){
        $id=$request->header('id');
        $data=Color::where("user_id",$id)->get();
        return Json::response('success','Color Lists',$data,200);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function createColor(Request $request)
    {
        try {
            $id=$request->header('id');
            $color=new Color();
            $color->name = $request->name;
            $color->slug =General::crateSlug($request->name);
            $color->user_id = $id;
            $color->save();
            return Json::response('success','Color has been created successfully',$color,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }

    public function colorById(Request $request){
        $user_id=$request->header('id');
        $result=Color::where('user_id',$user_id)->where('id',$request->color_id)->first();
        return $result;
    }

    public function updateColor(Request $request)
    {
        try {
            $id=$request->header('id');
            $color=Color::findOrFail($request->color_id);
            $color->name = $request->name;
            $color->slug =General::crateSlug($request->name);
            $color->save();
            return Json::response('success','Color has been updated successfully',$color,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
    public function deleteColor(Request $request)
    {
        try {
            $user_id=$request->header('id');
            $obj=Color::where('user_id',$user_id)->where('id',$request->color_id)->delete();
            return Json::response('success','Color has been deleted successfully',$obj,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
}
