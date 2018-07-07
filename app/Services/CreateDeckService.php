<?php

namespace App\Services;

use App\Api\V1\Http\Requests\Deck\CreateDeck;
use App\Entities\Deck;

class CreateDeckService
{
    /**
     * Upload deck
     *
     * @return \App\Entities\Deck
     */
    public static function handle(CreateDeck $request, Deck $deck)
    {
        $user = $request->user();
        $deck->user()->associate($user);

        $deck->fill($request->all());
        $deck->save();

        $deck->images()->attach($request->images);

        return $deck;
    }
}
