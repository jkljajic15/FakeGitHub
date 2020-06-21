<?php

/** @var Factory $factory */

use App\Repository;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Repository::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'description' => $faker->paragraph(3, true),
        'user_id' => User::all()->random()->id
    ];
});
