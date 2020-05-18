<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reply;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        //

        'body'=>$faker->paragraph(rand(3,7),true),
        'question_id'=>rand(0,10),
        'votes_count'=>rand(0,10),
        'user_id'=>\App\User::pluck('id')->random()
    ];
});
