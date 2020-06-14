<?php

/** @var Factory $factory */

use App\Issue;
use App\Issue_Comment;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Issue_Comment::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'issue_id' => Issue::all()->random()->id,
        'body' => $faker->realText()
    ];
});
