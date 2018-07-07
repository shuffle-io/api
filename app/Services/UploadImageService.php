<?php

namespace App\Services;

use App\Api\V1\Http\Requests\Image\UploadImage;
use App\Entities\Image;

class UploadImageService
{
    /**
     * Upload image
     *
     * @return \App\Entities\Image
     */
    public static function handle(UploadImage $request, Image $image)
    {
        $user = $request->user();
        $image->user()->associate($user);

        $image->path = $request->file('image')->store("uploads/{$user->id}");
        $image->save();

        return $image;
    }
}
