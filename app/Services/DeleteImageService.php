<?php

namespace App\Services;

use Storage;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

use App\Api\V1\Http\Requests\Image\DeleteImage;
use App\Entities\Image;

class DeleteImageService
{
    /**
     * Delete image
     * 
     * @return \App\Entities\Image
     */
    public static function handle(DeleteImage $request, Image $image)
    {
        Storage::delete($image->path);

        return $image->delete();
    }
}
