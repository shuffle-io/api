<?php

use Illuminate\Http\Request;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['bindings'])->group(function () {
    $api = app('Dingo\Api\Routing\Router');
    $api->version('v1', function ($api) {
        $api->post('users', 'App\Api\V1\Http\Controllers\Auth\RegisterController@create', ['as' => 'users.create', 'uses' => 'App\Api\V1\Http\Controllers\Auth\RegisterController@create']);
        $api->post('password/email', 'App\Api\V1\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail', ['as' => 'password.email', 'uses' => 'App\Api\V1\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail']);
        $api->post('password/reset', 'App\Api\V1\Http\Controllers\Auth\ResetPasswordController@reset', ['as' => 'password.reset', 'uses' => 'App\Api\V1\Http\Controllers\Auth\ResetPasswordController@reset']);

        Route::apiResource(
            'users',
            '\App\Api\V1\Http\Controllers\UserController',
            ['only' => ['index', 'show', 'update']]
        );

        Route::resource(
            'images',
            '\App\Api\V1\Http\Controllers\ImageController'
        );

        Route::resource(
            'decks',
            '\App\Api\V1\Http\Controllers\DeckController'
        );

        Route::resource(
            'shuffle',
            '\App\Api\V1\Http\Controllers\ShuffleController',
            ['only' => ['show']]
        );
    });
});
