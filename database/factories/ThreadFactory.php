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

$factory->define(App\Thread::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,5),
        'forum_id' => $faker->numberBetween(1,5),
        'replies' => $faker->numberBetween(1,10),
        'title' => $faker->realText($maxNbChars = 30, $indexSize = 2),
    ];
});