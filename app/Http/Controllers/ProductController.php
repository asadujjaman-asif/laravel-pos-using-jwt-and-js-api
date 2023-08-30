<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;
use App\Helper\General;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function productList()
    {
        return view('pages.dashboard.product-page');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getProduct(Request $request)
    {
        $id=$request->header('id');
        return Product::where("user_id",$id)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function createProduct(Request $request)
    {
        try {
            $id=$request->header('id');
            $img=$request->file('image');
            $product=new Product();
            $product->category_id = $request->category_id;
            $product->sub_category_id = $request->sub_category_id;
            $product->brand_id = $request->brand_id;
            $product->unit_id = $request->unit_id;
            $product->productName = $request->productName;
            $product->purchasePrice = $request->purchasePrice;
            $product->salePrice = $request->salePrice;
            $product->qty = $request->qty;
            $product->shortDescription = $request->productDescription;
            $product->slug = Str::slug($request->productName)."-".$id;
            $product->user_id = $id;
            $product->SKU = Str::of($request->productName)->upper()->substr(0,3)."-".rand(10000,99999);
            $product->image = General::fileUpload($img,$id);
            $product->save();
            return response()->json([
                'status' => 'success',
                'message' =>'Product has been saved successfully'
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
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * Remove the specified resource from storage.
     */
    public function deleteProduct(Request $request)
    {
        try {
            $user_id=$request->header('id');
            Product::where('user_id',$user_id)->where('id',$request->product_id)->delete();
            return response()->json([
                'status' => 'success',
                'message' =>'Product has been deleted successfully'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' =>'Unauthorized user'
            ], 200);
        }
    }
}
