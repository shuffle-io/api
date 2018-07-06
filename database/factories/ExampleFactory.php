<?php

use Faker\Generator as Faker;

$factory->define(App\Entities\Example::class, function (Faker $faker) {
    return [
        'hash'       => $faker->unique()->md5,
        'user_id'    => $faker->numberBetween(1, App\Entities\User::count())
    ];
});
