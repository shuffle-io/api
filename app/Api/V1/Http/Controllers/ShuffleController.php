<?php

namespace App\Api\V1\Http\Controllers;

use App\Api\V1\Http\Controllers\Controller;
use App\Api\V1\Http\Requests\Shuffle\ShuffleDeck;
use App\Entities\Deck;
use App\Services\ShowImageService;
use Illuminate\Http\Request;

class ShuffleController extends Controller
{
    /**
     * @param  ShuffleDeck $request
     * @return \Dingo\Api\Http\Response
     */
    protected function show(Deck $deck)
    {
        $image = Deck::all()->last()->images->random();
        return ShowImageService::handle($image);
    }
}
