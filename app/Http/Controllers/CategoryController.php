<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Exception;
use Illuminate\Support\Str;
use App\Helper\Json;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function categoryList()
    {
        return view('pages.dashboard.category-page');
    }
    public function getCategory(Request $request){
        $id=$request->header('id');
        $data=Category::where("user_id",$id)->get();
        return Json::response('success','Category result',$data,200);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function createCategory(Request $request)
    {
        try {
            $id=$request->header('id');
            $category=new Category();
            $category->category_name = $request->category_name;
            $category->category_image = null;
            $category->slug = Str::slug($request->category_name)."-".$id;
            $category->user_id = $id;
            $category->save();
            return Json::response('success','Category has been created successfully',$category,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function updateCategory(Request $request)
    {
        try {
            $id=$request->header('id');
            $category=Category::findOrFail($request->category_id);
            $category->category_name = $request->category_name;
            $category->category_image = null;
            $category->slug = Str::slug($request->category_name)."-".$id;
            $category->user_id = $id;
            $category->save();
            return Json::response('success','Category has been updated successfully',$category,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteCategory(Request $request)
    {
        try {
            $user_id=$request->header('id');
            $obj=Category::where('user_id',$user_id)->where('id',$request->category_id)->delete();
            return Json::response('success','Category has been deleted successfully',$obj,200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
    public function categoryById(Request $request){
        $user_id=$request->header('id');
        $result=Category::where('user_id',$user_id)->where('id',$request->category_id)->first();
        return $result;
    }
}
