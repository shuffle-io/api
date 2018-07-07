<?php

namespace App\Api\V1\Http\Requests\Deck;

use App\Entities\Deck;
use Dingo\Api\Http\FormRequest;

class DeleteDeck extends FormRequest
{
    public function authorize()
    {
        return $this->user()->id === $this->deck->user_id;
    }

    public function rules()
    {
        return [];
    }
}
