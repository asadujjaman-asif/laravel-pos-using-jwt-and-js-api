<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Brand;
use Exception;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Support\Str;
use App\Helper\Json;

class BrandController extends Controller
{
    /**
     * Load brand page
     */
    public function brandList()
    {
        return view('pages.dashboard.brand-page');
    }
     /**
     * Return  brand Lists
     */
    public function getBrand(Request $request){
        $id=$request->header('id');
        $data=Brand::where("user_id",$id)->get();
        return Json::response('suceess','Brand result',$data,200);
    }
    /**
     * Create a new brand
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
            $response=$brand->save();
            $msg='Brand has been created successfully';
            return Json::response('suceess',$msg,$response,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
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
            $msg='Brand has been updated successfully';
            return Json::response('suceess',$msg,$brand,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteBrand(Request $request)
    {
        try {
            $user_id=$request->header('id');
            $brand=Brand::where('user_id',$user_id)->where('id',$request->brand_id)->delete();
            $msg='Brand has been deleted successfully';
            return Json::response('success',$msg,$brand,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
    public function brandyById(Request $request){
        $user_id=$request->header('id');
        $result=Brand::where('user_id',$user_id)->where('id',$request->brand_id)->first();
        return Json::response('success','success',$result,200);
    }
}
