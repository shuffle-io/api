<?php

namespace App\Api\V1\Http\Requests\Image;

use App\Entities\Image;
use Dingo\Api\Http\FormRequest;

class DeleteImage extends FormRequest
{
    public function authorize()
    {
        return $this->user()->id === $this->image->user_id;
    }

    public function rules()
    {
        return [];
    }
}
