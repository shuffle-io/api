<?php

namespace App\Services;

use App\Entities\Image;

class ShowImgurImageService
{
    public static function handle($image)
    {
        $filename = "{$image->id}.jpg";
        $tempImage = tempnam(sys_get_temp_dir(), $filename);
        copy("http://i.imgur.com/{$filename}", $tempImage);

        return response()->download($tempImage, $filename);
    }
}
