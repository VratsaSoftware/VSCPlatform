<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use File;

trait ImageUploadTrait
{
    function storeImage($imageFile, $path, $width = null, $height = null)
    {
        $userPic = $imageFile;
        $image = Image::make($userPic->getRealPath());
        $image->fit(is_null($width) ? 800 : $width, is_null($height) ? 600 : $height, function ($constraint) {
            $constraint->upsize();
        });
        $origin = $userPic->getClientOriginalName();
        $name = time() . "_" . $origin . '_' . rand(1, 100000);
        $name = str_replace(' ', '', strtolower($name));
        $name = md5($name);
        $pathUrl = public_path()  . $path;

        if (!File::exists($pathUrl)) {
            $folder = mkdir($pathUrl, 0777, true);
        }
        $image->save($pathUrl . $name, 90);

        return $name;
    }
}