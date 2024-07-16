<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class UploadController extends Controller
{
    // upload function
    function upload(){
        return view('upload');
    }

    function uploadPost(Request $request){
        // Upload an image file to cloudinary with one line of code
        $uploadedFileUrl = cloudinary()->upload($request->file('file')->getRealPath(),['folder'=>'r-commerce'])->getSecurePath();
        dd($uploadedFileUrl);
    }    
}
