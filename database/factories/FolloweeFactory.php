<?php

/** @var Factory $factory */

use App\Followee;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Followee::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'followee_id' => User::all()->random()->id
    ];
});
