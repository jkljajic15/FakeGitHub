<?php

/** @var Factory $factory */

use App\Issue;
use App\Repository;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;


$factory->define(Issue::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence(),
        'body' => $faker->realText(),
        'status' => 'open',
        'repository_id' => $id = Repository::all()->random()->id,
        'user_id' => User::all()->random()->id,
        'issue_number' =>  Repository::find($id)->issues->count() + 1
    ];
});

