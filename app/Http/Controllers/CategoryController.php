<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Exception;
use Illuminate\Support\Str;

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
        return Category::where("user_id",$id)->get();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            $id=$request->header('id');
            $category=new Category();
            $category->category_name = $request->category_name;
            $category->slug = "{Str::slug($request->category_name)}-{$id}";
            $category->user_id = $id;
            $category->save();
            return response()->json([
                'status' => 'success',
                'message' =>'Category has been created successfully'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' =>'Unauthorized user'
            ], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
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
            $category->slug = "{Str::slug($request->category_name)}-{$id}";
            $category->user_id = $id;
            $category->save();
            return response()->json([
                'status' => 'success',
                'message' =>'Category has been updated successfully'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' =>'Unauthorized user'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteCategory(Request $request)
    {
        try {
            $user_id=$request->header('id');
            Category::where('user_id',$user_id)->where('id',$request->category_id)->delete();
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
}
