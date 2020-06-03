<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Repository;
use Faker\Generator as Faker;

$factory->define(Repository::class, function (Faker $faker) {
    $userIds = \App\User::all()->pluck('id')->toArray();
    $randIndx = array_rand($userIds);
    return [
        'name' => 'Repo'.$faker->randomNumber(),
        'description' => $faker->paragraph(1, false),
        'user_id' => $userIds[$randIndx]
    ];
});
