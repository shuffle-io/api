<?php

namespace App\Entities;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    public $table = 'permissions';

    protected $dates = ['created_at', 'updated_at'];

    public $fillable = [
        'name',
        'display_name',
        'description',
    ];

    public static $rules = [
        'name' => 'required|unique'
    ];
}


