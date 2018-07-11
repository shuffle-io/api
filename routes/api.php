<?php

use Illuminate\Http\Request;

Route::resource(
    'shuffle',
    '\App\Api\V1\Http\Controllers\ShuffleController',
    ['only' => ['show']]
);