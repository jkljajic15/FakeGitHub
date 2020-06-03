<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Follower;
use Faker\Generator as Faker;

$factory->define(Follower::class, function (Faker $faker) {
    return [
        'user_id' => random_int(1,6),
        'follower_id' => random_int(1,6)
    ];
});
