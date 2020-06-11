<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImageUploadController extends Controller
{
    public function upload(Request $request){
        $validation = Validator::make($request->all(), [
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($validation->passes())
        {
            $image = $request->file('select_file');
            $imageName = Storage::disk('public')->put('upload/location', $image);
            return response()->json([
                'success'   => 'Image Upload Successfully',
                'imageURL' => 'https://'.request()->getHttpHost().'/storage/'.$imageName,
            ]);
        }
        else
        {
            return response()->json([
                'message'   => $validation->errors()->all(),
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        }
    }



    public function uploadImage(Request $request){
        try{
            $file=$request->file('file');
            $fileNameToStore= Storage::disk('public')->put('upload/location', $file);
            return json_encode(['location' => 'https://'.request()->getHttpHost().'/storage/'.$fileNameToStore]);
        }
        catch(\Exception $e){
            echo json_encode($e->getMessage());
        }
    }
}
