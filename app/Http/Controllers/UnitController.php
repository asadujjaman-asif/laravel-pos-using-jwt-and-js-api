<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Helper\Json;


class UnitController extends Controller
{
    public function unitList()
    {
        return view('pages.dashboard.unit-page');
    }
    public function getUnit(Request $request){
        $id=$request->header('id');
        $data=Unit::where("user_id",$id)->get();
        return Json::response('success','Unit result',$data,200);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function createUnit(Request $request)
    {
        try {
            $id=$request->header('id');
            $unit=new Unit();
            $unit->name = $request->name;
            $unit->user_id = $id;
            $unit->save();
            return Json::response('success','Unit has been created successfully',$unit,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function updateUnit(Request $request)
    {
        try {
            $id=$request->header('id');
            $unit=Unit::findOrFail($request->unit_id);
            $unit->name = $request->name;
            $unit->user_id = $id;
            $unit->save();
            return Json::response('success','Unit has been updated successfully',$unit,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteUnit(Request $request)
    {
        try {
            $user_id=$request->header('id');
            $obj=Unit::where('user_id',$user_id)->where('id',$request->unit_id)->delete();
            return Json::response('success','Unit has been deleted successfully',$obj,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
    public function unitById(Request $request){
        $user_id=$request->header('id');
        $result=Unit::where('user_id',$user_id)->where('id',$request->unit_id)->first();
        return $result;
    }
}
