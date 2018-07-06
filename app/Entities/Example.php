<?php

namespace App\Entities;

use Laratrust\Models\LaratrustTeam;

class Example extends LaratrustTeam
{
    public $fillable = [
        'hash'
    ];

    public static $rules = [
        'hash' => 'required|string',
    ];

    public function user()
    {
        return $this->belongsTo('App\Entities\User');
    }
}
