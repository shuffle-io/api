<?php

namespace App\Transformers;

use App\Entities\User;
use App\Transformers\DeckTransformer;
use App\Transformers\ImageTransformer;
use League\Fractal;

class UserTransformer extends Fractal\TransformerAbstract
{
    protected $availableIncludes = [
        'images',
        'decks',
    ];

    public function transform(User $user)
    {
        return [
            'name' => $user->name,
            'email' => $user->email,
            'links' => [
                [
                    'rel' => 'self',
                    'uri' => '/users/' . $user->id,
                ],
            ],
        ];
    }

    /**
     * @param User
     * @return \League\Fractal\Resource\Collection
     */
    public function includeImages(User $user)
    {
        $images = $user->images;

        return $this->collection($images, new ImageTransformer);
    }

    /**
     * @param User
     * @return \League\Fractal\Resource\Collection
     */
    public function includeDecks(User $user)
    {
        $decks = $user->decks;

        return $this->collection($decks, new DeckTransformer);
    }
}
