<?php

/** @var Factory $factory */

use App\Issue;
use App\Repository;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Issue::class, function (Faker $faker) {
    return [
        'title' => $faker->title(),
        'body' => $faker->realText(),
        'status' => 'open',
        'repository_id' => factory(Repository::class),
        'user_id' => factory(User::class)
    ];
});