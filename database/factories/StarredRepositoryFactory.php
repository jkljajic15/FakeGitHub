<?php

/** @var Factory $factory */

use App\Repository;
use App\StarredRepository;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$id=0;

$factory->define(StarredRepository::class, function (Faker $faker) {

    global $id;
    return [
        'user_id' => User::all()->random()->id,
        'repository_id' => $id = Repository::all()->random()->id,

    ];
});

$factory->afterCreating(Repository::class, function (){
    global $id;
   Repository::find($id)->increment('stars');
});
