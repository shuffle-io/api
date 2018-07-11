<?php

namespace App\Api\V1\Http\Controllers;

use App\Services\ShuffleDeckService;
use App\Services\GetAlbumImagesService;
use App\Services\ShowImgurImageService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ShuffleController extends Controller
{
    /**
     * @param  ShuffleDeck $request
     */
    protected function show(string $id)
    {
        $images = GetAlbumImagesService::handle($id);
        $image = ShuffleDeckService::handle($images);
        return ShowImgurImageService::handle($image);
    }
}
