<?php

use Faker\Generator as Faker;
use App\Post as Post;
use App\Category as Category;
$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->words($nb = 3, $asText = true)  ,
        'description' => $faker->text,
        'content' =>$faker->paragraph,
        'category_id'=> function()
        {
            #return factory(Category::class)->create()->id; //to create new category and assign it
            return Category::all()->random(1)->first()->id; // to assign exists category
        },
    ];
});
