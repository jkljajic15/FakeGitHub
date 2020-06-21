<?php

/** @var Factory $factory */

use App\Repository;
use App\StarredRepository;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;


$factory->define(StarredRepository::class, function (Faker $faker) {

    return [
        'user_id' => User::all()->random()->id,
        'repository_id' => $id = Repository::all()->random()->id,
    ];
});
$factory->afterCreating(StarredRepository::class, function (){

    foreach(Repository::all() as $repository){
        $repository->update(['stars' => $repository->starredRepositories->count()]);
    }

});
