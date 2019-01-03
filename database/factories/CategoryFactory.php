<?php

use Faker\Generator as Faker;
use App\Category as Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
