<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Offer;
use App\Request;




class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
	  //  factory(App\Category::class,5)->create()->each(function ($category)
		 // { $category->products()->saveMany(factory(App\Product::class , 10)->make());});

    

        //  factory(App\Offer::class, 20)->create()->each(function ($offer) {
        //     $offer->products()->save(factory(App\Role::class)->make());
        // });

        // $products = Product::all();

        // factory(App\Offer::class,10)->create();

        // Offer::all()->each(function ($offer) use ($products) { 
        //     $offer->products()->attach(
        //         $products->random(rand(1, 20))->pluck('id')->toArray()
        //     ); 
        // });

        factory(App\Request::class,10)->create();



    }
}
