<?php

namespace App\Services;

use App\Api\V1\Http\Requests\Deck\DeleteDeck;
use App\Entities\Deck;

class DeleteDeckService
{
    /**
     * Delete deck
     *
     * @return \App\Entities\Deck
     */
    public static function handle(DeleteDeck $request, Deck $deck)
    {
        return $deck->delete();
    }
}
