<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Followee;
use Faker\Generator as Faker;

$factory->define(Followee::class, function (Faker $faker) {
    return [
        'user_id' => random_int(1, 6),
        'followee_id' => random_int(1, 6)
    ];
});
