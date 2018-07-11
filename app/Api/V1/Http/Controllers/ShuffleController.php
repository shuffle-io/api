<?php

namespace App\Api\V1\Http\Controllers;

use App\Api\V1\Http\Controllers\Controller;
use App\Api\V1\Http\Requests\Shuffle\ShuffleDeck;
use App\Entities\Deck;
use App\Services\ShowImageService;
use App\Services\ShuffleDeckService;
use App\Services\GetAlbumImagesService;
use App\Services\ShowImgurImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShuffleController extends Controller
{
    /**
     * @param  ShuffleDeck $request
     * @return \Dingo\Api\Http\Response
     */
    protected function show(string $id)
    {
        $images = GetAlbumImagesService::handle($id);
        $image = ShuffleDeckService::handle($images);
        return ShowImgurImageService::handle($image);
    }
}
