<?php

namespace App\Services;

use App\Api\V1\Http\Requests\Role\ExampleRequest;

class CreateExampleService
{
    /**
     * Create example and attach user
     * 
     * @return Example
     */
    public static function handle(ExampleRequest $request, Example $example)
    {
        $example = $example->fill($request->all());
        return $example->user()->associate($user);
    }
}
