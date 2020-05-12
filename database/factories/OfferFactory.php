<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Offer;

use Faker\Generator as Faker;

$factory->define(Offer::class, function (Faker $faker) {
    return [
        'duration'=> rand(1,10),
        'desc'	=> $faker->text,
        'price'	=>$faker->randomFloat($nbMaxDecimals = NULL, $min = 500, $max = 20000),
    ];
});
