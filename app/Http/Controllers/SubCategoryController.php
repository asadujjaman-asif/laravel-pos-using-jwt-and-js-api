<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function subCategoryList()
    {
        return view('pages.dashboard.sub-cat-page');
    }
    public function getSubCategory(Request $request){
        $id=$request->header('id');
        return SubCategory::with('category')->where("user_id",$id)->get();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function createSubCategory(Request $request)
    {
        try {
            $id=$request->header('id');
            $subCat=new SubCategory();
            $subCat->name = $request->name;
            $subCat->image = null;
            $subCat->description = $request->description;
            $subCat->slug = Str::slug($request->name)."-".$id;
            $subCat->user_id = $id;
            $subCat->category_id = $request->category_id;
            $subCat->save();
            return response()->json([
                'status' => 'success',
                'message' =>'Sub category has been created successfully'
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
    public function updateSubCategory(Request $request)
    {
        try {
            $id=$request->header('id');
            $subCat=SubCategory::findOrFail($request->subCat_id);
            $subCat->name = $request->name;
            $subCat->image = null;
            $subCat->description = $request->description;
            $subCat->slug = Str::slug($request->name)."-".$id;
            $subCat->user_id = $id;
            $subCat->category_id = $request->category_id;
            $subCat->save();
            return response()->json([
                'status' => 'success',
                'message' =>'Sub category has been updated successfully'
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
    public function deleteSubCategory(Request $request)
    {
        try {
            $user_id=$request->header('id');
            SubCategory::where('user_id',$user_id)->where('id',$request->subCat_id)->delete();
            return response()->json([
                'status' => 'success',
                'message' =>'Sub category has been deleted successfully'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' =>'Unauthorized user'
            ], 200);
        }
    }
    public function subCategoryById(Request $request){
        $user_id=$request->header('id');
        $result=SubCategory::where('user_id',$user_id)->where('id',$request->subCat_id)->first();
        return $result;
    }
    /**
     * @param Request $request
     * @return Response
     * @response return Sub Category list by category id for Suggested Sub category
    */
    public function subCatBySubId(Request $request){
        $user_id=$request->header('id');
        $result=SubCategory::where('user_id',$user_id)->where('category_id',$request->catId)->get();
        return $result;
    }
}
