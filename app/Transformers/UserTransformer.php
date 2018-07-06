<?php

namespace App\Transformers;

use App\Entities\User;
use League\Fractal;

class UserTransformer extends Fractal\TransformerAbstract
{
    protected $availableIncludes = [
        'examples'
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
    public function includeExamples(User $user)
    {
        $examples = $user->examples;

        return $this->collection($examples, ExampleTransformer::class);
    }
}
