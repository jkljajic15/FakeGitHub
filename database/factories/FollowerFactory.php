<?php

/** @var Factory $factory */

use App\Follower;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Follower::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'follower_id' => User::all()->random()->id
    ];
});
