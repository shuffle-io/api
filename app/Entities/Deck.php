<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    public $fillable = [
        'name',
    ];

    public static $rules = [
        'name' => 'required|string',
    ];

    public function user()
    {
        return $this->belongsTo('App\Entities\User');
    }

    public function images()
    {
        return $this->belongsToMany('App\Entities\Image');
    }
}
