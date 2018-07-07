<?php

namespace App\Api\V1\Http\Requests\Image;

use Dingo\Api\Http\FormRequest;

use App\Entities\Image;

class UploadImage extends FormRequest
{
    public function authorize()
    {
        return $this->user();
    }

    public function rules()
    {
        return Image::$rules;
    }
}
