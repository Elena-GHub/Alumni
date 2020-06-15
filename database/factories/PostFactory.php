<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,10),
        'thread_id' => $faker->numberBetween(1,5),
        'body' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});