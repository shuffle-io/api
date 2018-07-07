<?php

namespace App\Api\V1\Http\Requests\Deck;

use App\Entities\Deck;
use Dingo\Api\Http\FormRequest;

class CreateDeck extends FormRequest
{
    public function authorize()
    {
        return $this->user();
    }

    public function rules()
    {
        return Deck::$rules;
    }
}
