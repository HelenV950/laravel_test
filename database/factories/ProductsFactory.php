<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    //dd(Storage::disk('local')->path('public/seed-images'));

    return [
        'category_id'=> \App\Models\Category::get()->random()->id,
        'SKU' =>  $faker->unique()->randomNumber(5),
        'name' => $faker->unique()->sentence(rand(1, 5)),
        'description' => $faker->sentences(rand(5, 10), true),
        'shot_description' => $faker->text(200),
        'thumbnail' => 'public/images/' . $faker->file(
            Storage::disk('local')->path('public/seed-images'),
            Storage::disk('local')->path('public/images'),
            false
        ),
        'price' => $faker->randomFloat(2, 100, 5000),
        'discount' => rand(0, 35),
        'quantity' => rand(0, 15)


    ];

    //dd($fake);
});
