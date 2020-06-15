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

$factory->define(App\Forum::class, function (Faker $faker) {
    return [
        'forum_category_id' => $faker->numberBetween(1,4),
        'views' => $faker->numberBetween(1,20),
        'replies' => $faker->numberBetween(1,10),
        'title' => $faker->word(),
    ];
});