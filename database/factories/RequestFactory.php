<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Request;
use Faker\Generator as Faker;

$factory->define(Request::class, function (Faker $faker) {
    return [
    	'product_id'=>rand(1,30),
    	'name'=>  $faker->name,
        'phone_number'	=> $faker->phoneNumber,
        //
    ];
});
