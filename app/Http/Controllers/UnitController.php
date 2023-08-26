<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;

class UnitController extends Controller
{
    public function unitList()
    {
        return view('pages.dashboard.unit-page');
    }
    public function getUnit(Request $request){
        $id=$request->header('id');
        return Unit::where("user_id",$id)->get();
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
            return response()->json([
                'status' => 'success',
                'message' =>'Unit has been created successfully'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' =>'Unauthorized user',
                "error" => $e->getMessage()
            ], 200);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function updateUnit(Request $request)
    {
        try {
            $id=$request->header('id');
            $category=Unit::findOrFail($request->category_id);
            $category->category_name = $request->category_name;
            $category->category_image = null;
            $category->slug = Str::slug($request->category_name)."-".$id;
            $category->user_id = $id;
            $category->save();
            return response()->json([
                'status' => 'success',
                'message' =>'Category has been updated successfully'
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
    public function deleteUnit(Request $request)
    {
        try {
            $user_id=$request->header('id');
            Unit::where('user_id',$user_id)->where('id',$request->category_id)->delete();
            return response()->json([
                'status' => 'success',
                'message' =>'Category has been deleted successfully'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' =>'Unauthorized user'
            ], 200);
        }
    }
    public function unitById(Request $request){
        $user_id=$request->header('id');
        $result=Unit::where('user_id',$user_id)->where('id',$request->category_id)->first();
        return $result;
    }
}
