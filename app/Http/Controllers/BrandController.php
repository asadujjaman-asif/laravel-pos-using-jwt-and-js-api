<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Brand;
use Exception;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Support\Str;

class BrandController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function brandList()
    {
        return view('pages.dashboard.brand-page');
    }
    public function getBrand(Request $request){
        $id=$request->header('id');
        return Brand::where("user_id",$id)->get();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function createBrand(Request $request)
    {
        try {
            $id=$request->header('id');
            $brand=new Brand();
            $brand->name = $request->name;
            $brand->images = null;
            $brand->description = $request->description;
            $brand->slug = Str::slug($request->name)."-".$id;
            $brand->user_id = $id;
            $brand->save();
            return response()->json([
                'status' => 'success',
                'message' =>'Brand has been created successfully'
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
    public function updateBrand(Request $request)
    {
        try {
            $id=$request->header('id');
            $brand=Brand::findOrFail($request->brand_id);
            $brand->name = $request->name;
            $brand->images = null;
            $brand->description = $request->description;
            $brand->slug = Str::slug($request->name)."-".$id;
            $brand->user_id = $id;
            $brand->save();
            return response()->json([
                'status' => 'success',
                'message' =>'Brand has been updated successfully'
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
    public function deleteBrand(Request $request)
    {
        try {
            $user_id=$request->header('id');
            Brand::where('user_id',$user_id)->where('id',$request->brand_id)->delete();
            return response()->json([
                'status' => 'success',
                'message' =>'Brand has been deleted successfully'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' =>'Unauthorized user'
            ], 200);
        }
    }
    public function brandyById(Request $request){
        $user_id=$request->header('id');
        $result=Brand::where('user_id',$user_id)->where('id',$request->brand_id)->first();
        return $result;
    }
}
