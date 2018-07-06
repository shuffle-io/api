<?php

namespace App\Api\V1\Http\Requests\User;

use App\Entities\User;
use Dingo\Api\Http\FormRequest;

class UserUpdate extends FormRequest
{
    /**
     * Users may edit only their own profiles
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->id === $this->user->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return User::$updateRules;
    }
}
