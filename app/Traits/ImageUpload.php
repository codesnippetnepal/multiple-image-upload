<?php
/**
 * Created by PhpStorm.
 * User: azenmoktan
 * Date: 5/23/2020
 * Time: 9:10 AM
 */

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait ImageUpload
{
    public function UserImageUpload($query) // Taking input image as parameter
    {
        $image_name = str_random(20);
        $ext = strtolower($query->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'uploads/';    //Creating Sub directory in Public folder to put image

//        create folder if not exist
//        if (!File::isDirectory($upload_path)) {
//
//            File::makeDirectory($upload_path, 0777, true, true);
//
//        }

        $image_url = $upload_path . $image_full_name;
        $success = $query->move($upload_path, $image_full_name);
        return $image_url; // Just return image
    }
}