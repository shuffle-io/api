<?php

namespace App\Transformers;

use App\Entities\Deck;
use App\Transformers\ImageTransformer;
use App\Transformers\UserTransformer;
use League\Fractal;

class DeckTransformer extends Fractal\TransformerAbstract
{
    protected $availableIncludes = [
        'user',
        'images',
    ];

    public function transform(Deck $deck)
    {
        return [
            'id' => $deck->id,
            'name' => $deck->name,
            'links' => [
                [
                    'rel' => 'self',
                    'uri' => '/decks/' . $deck->id,
                ],
            ],
        ];
    }

    /**
     * @param  Deck
     * @return \League\Fractal\Resource\Item
     */
    public function includeUser(Deck $deck)
    {
        $user = $deck->user;

        return $this->item($user, new UserTransformer);
    }

    /**
     * @param  Deck
     * @return \League\Fractal\Resource\Collection
     */
    public function includeImages(Deck $deck)
    {
        $images = $deck->images;

        return $this->collection($images, new ImageTransformer);
    }
}
