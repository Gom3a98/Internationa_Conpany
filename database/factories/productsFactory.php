<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'category_id'=>$faker->randomDigit,
        'description'=>$faker->name,
        'location'=>$faker->city,
        'price'=>$faker->randomDigit,
        'count'=>$faker->randomDigit,
        'status'=>$faker->randomDigit%2,

    ];
});
//phone_number()
//city_name()