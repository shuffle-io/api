<?php

namespace App\Services;

use App\Entities\Image;

class ShowImageService
{
    public static function handle(Image $image)
    {
        return response()->file(storage_path('app/' . $image->path));
    }
}
