<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Example extends Model
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
