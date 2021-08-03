<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Article;
use Faker\Generator as Faker;

$factory->definitio(Article::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'title' => $faker->text(50),
        'slug' => $faker->slug(),
        'body' => $faker->paragraph(rand(5, 20))
    ];
});
