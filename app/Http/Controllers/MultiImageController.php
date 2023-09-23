<?php

namespace App\Http\Controllers;

use App\Models\MultiImage;
use App\Http\Requests\StoreMultiImageRequest;
use App\Http\Requests\UpdateMultiImageRequest;
use Illuminate\Http\Request;
use App\Helper\Json;
use App\Helper\General;
use Exception;
use Illuminate\Support\Facades\File;

class MultiImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function productImageById(Request $request)
    {
        $id=$request->header('id');
        $images=MultiImage::where('product_id',$request->product_id)->where('user_id',$id)->first();
        return Json::response('success','Image list',$images,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function updateProductMultiImage(Request $request)
    {
        try {
            $id=$request->header('id');
            $images=MultiImage::where('product_id',$request->product_id)->where('user_id',$id)->first();
            if($images){
                $mulImage=MultiImage::findOrFail($images->id);
                if($request->hasFile('imageOne')){
                    $imageOne=$request->file('imageOne');
                    $mulImage->imageOne = General::fileUpload($imageOne,$id,'multiImages');
                    File::delete($request->filePathOne);
                }
                if($request->hasFile('imageTwo')){
                    $imageTwo=$request->file('imageTwo');
                    $mulImage->imageTwo = General::fileUpload($imageTwo,$id,'multiImages');
                    File::delete($request->filePathTwo);
                }
                if($request->hasFile('imageThree')){
                    $imageThree=$request->file('imageThree');
                    $mulImage->imageThree = General::fileUpload($imageThree,$id,'multiImages');
                    File::delete($request->filePathThree);
                }
                if($request->hasFile('imageFour')){
                    $imageFour=$request->file('imageFour');
                    $mulImage->imageFour = General::fileUpload($imageFour,$id,'multiImages');
                    File::delete($request->filePathFour);
                }
                $mulImage->save();
            }else{
                $multiImage=new MultiImage();

                $imageOne=$request->file('imageOne');
                $imageTwo=$request->file('imageTwo');
                $imageThree=$request->file('imageThree');
                $imageFour=$request->file('imageFour');
                
                $multiImage->user_id = $id;
                $multiImage->product_id = $request->product_id;
                $multiImage->imageOne = General::fileUpload($imageOne,$id,'multiImages');
                $multiImage->imageTwo = General::fileUpload($imageTwo,$id,'multiImages');
                $multiImage->imageThree = General::fileUpload($imageThree,$id,'multiImages');
                $multiImage->imageFour = General::fileUpload($imageFour,$id,'multiImages');
                $multiImage->save();

            }
            return Json::response('success','Product multi image has been uploaded successfully','',200);
        }catch(Exception $e){
            return Json::response('failed','Unauthorized user',$e->getMessage(),200);
        }
    }
}
