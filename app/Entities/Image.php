<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $fillable = [];

    public static $rules = [];

    public function user()
    {
        return $this->belongsTo('App\Entities\User');
    }
}
