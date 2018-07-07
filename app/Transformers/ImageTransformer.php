<?php

namespace App\Transformers;

use App\Entities\Image;
use League\Fractal;

class ImageTransformer extends Fractal\TransformerAbstract
{
    protected $availableIncludes = [
        'user',
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

        return $this->item($user, UserTransformer::class);
    }
}
