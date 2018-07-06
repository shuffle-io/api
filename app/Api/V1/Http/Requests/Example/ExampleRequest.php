<?php

namespace App\Api\V1\Http\Requests\Example;

use App\Entities\Example;
use Dingo\Api\Http\FormRequest;

class ExampleRequest extends FormRequest
{
    public function authorize()
    {
        $example = $this->example;
        return $this->user()->can('create-example', $example);
    }

    public function rules()
    {
        return Example::$rules;
    }
}
