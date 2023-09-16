<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use App\Helper\Json;
use App\Helper\General;
use Exception;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function sizeList()
    {
        return view('pages.dashboard.size-page');
    }

    public function getSize(Request $request){
        $id=$request->header('id');
        $data=Size::where("user_id",$id)->get();
        return Json::response('success','Size result',$data,200);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function createSize(Request $request)
    {
        try {
            $id=$request->header('id');
            $size=new Size();
            $size->name = $request->name;
            $size->description = $request->description;
            $size->slug =General::crateSlug($request->name);
            $size->user_id = $id;
            $size->save();
            return Json::response('success','size has been created successfully',$size,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }

    public function sizeById(Request $request){
        $user_id=$request->header('id');
        $result=Size::where('user_id',$user_id)->where('id',$request->size_id)->first();
        return $result;
    }

    public function updateSize(Request $request)
    {
        try {
            $id=$request->header('id');
            $size=Size::findOrFail($request->size_id);
            $size->name = $request->name;
            $size->description = $request->description;
            $size->slug =General::crateSlug($request->name);
            $size->save();
            return Json::response('success','Size has been updated successfully',$size,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
    public function deleteSize(Request $request)
    {
        try {
            $user_id=$request->header('id');
            $obj=Size::where('user_id',$user_id)->where('id',$request->size_id)->delete();
            return Json::response('success','Size has been deleted successfully',$obj,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
}
