<?php

/** @var Factory $factory */

use App\Issue;
use App\Issue_Comment;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Issue_Comment::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'issue_id' => factory(Issue::class),
        'body' => $faker->realText()
    ];
});
