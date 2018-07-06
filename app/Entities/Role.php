<?php

namespace App\Entities;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $table = 'roles';

    protected $dates = ['created_at', 'updated_at'];

    public $fillable = [
        'name',
        'display_name',
        'description'
    ];

    public static $rules = [
        'name' => 'required|unique'
    ];
}
