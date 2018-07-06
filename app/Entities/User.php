<?php

namespace App\Entities;

Use App\Entities\Example;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, LaratrustUserTrait;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        'name'     => 'required|string|max:255|unique:users,id',
        'email'    => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ];

    public static $updateRules = [
        'name'     => 'sometimes|required|string|max:255|unique:users,id',
        'email'    => 'sometimes|required|string|email|max:255|unique:users,id'
    ];

    public function examples() {
        return $this->hasMany('App\Entities\Example');
    }
}
