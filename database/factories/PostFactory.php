<?php

use Faker\Generator as Faker;
use App\Post as Post;
use App\Category as Category;
use App\User as User;
$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->words($nb = 3, $asText = true)  ,
        'description' => $faker->text($maxNbChars = 100),
        'content' =>$faker->paragraph($nbSentences = 10, $variableNbSentences = true),
        'category_id'=> function()
        {
            // return factory(Category::class)->create()->id; //to create new category and assign it
            return Category::all()->random(1)->first()->id; // to assign exists category
        },
        'user_id'=> function()
        {
            // return factory(User::class)->create()->id; //to create new category and assign it
            return User::all()->random(1)->first()->id; // to assign exists category
        },
    ];
});
