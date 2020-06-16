<?php

/** @var Factory $factory */

use App\Issue;
use App\Repository;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$id=0;

$factory->define(Issue::class, function (Faker $faker) {

    global $id;
    return [
        'title' => $faker->sentence(),
        'body' => $faker->realText(),
        'status' => 'open',
        'repository_id' => $id = Repository::all()->random()->id,
        'user_id' => User::all()->random()->id,
        'issue_number' =>  1
    ];
});

$factory->afterCreating(Issue::class, function (){
    global $id;


    Issue::where('repository_id', $id)->update(['issue_number' => +1]);
});
