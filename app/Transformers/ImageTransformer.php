<?php

namespace App\Transformers;

use App\Entities\Image;
use App\Transformers\DeckTransformer;
use App\Transformers\UserTransformer;
use League\Fractal;

class ImageTransformer extends Fractal\TransformerAbstract
{
    protected $availableIncludes = [
        'user',
        'decks',
    ];

    public function transform(Image $image)
    {
        return [
            'id' => $image->id,
            'links' => [
                [
                    'rel' => 'self',
                    'uri' => '/images/' . $image->id,
                ],
            ],
        ];
    }

    /**
     * @param  Image
     * @return \League\Fractal\Resource\Item
     */
    public function includeUser(Image $image)
    {
        $user = $image->user;

        return $this->item($user, new UserTransformer);
    }

    /**
     * @param  Image
     * @return \League\Fractal\Resource\Item
     */
    public function includeDecks(Image $image)
    {
        $decks = $image->decks;

        return $this->collection($decks, new DeckTransformer);
    }
}
