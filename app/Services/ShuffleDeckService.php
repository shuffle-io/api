<?php

namespace App\Services;

use App\Api\V1\Http\Requests\Deck\ShuffleDeck;
use App\Entities\Deck;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ShuffleDeckService
{
    /**
     * Choose random image from given album
     *
     * @return \App\Entities\Deck
     */
    public static function handle(array $images)
    {
        $length = count($images);

        // srand((double) microtime() * 1000000);
        srand((double) microtime() * 1000000);
        $ndx = rand(0, $length - 1);

        return $images[$ndx];
    }
}
