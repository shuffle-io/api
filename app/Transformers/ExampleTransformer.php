<?php

namespace App\Transformers;

use App\Entities\Example;
use League\Fractal;

class ExampleTransformer extends Fractal\TransformerAbstract
{
    protected $availableIncludes = [
        'user'
    ];

    public function transform(Example $example)
    {
        return [
            'hash' => $example->hash,
            'links' => [
                [
                    'rel' => 'self',
                    'uri' => '/examples/' . $example->id,
                ],
            ],
        ];
    }

    /**
     * @param  Example
     * @return \League\Fractal\Resource\Item
     */
    public function includeUser(Example $example)
    {
        $user = $example->user;

        return $this->item($user, UserTransformer::class);
    }
}
