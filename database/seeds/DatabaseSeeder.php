<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
	factory(App\Category::class)->create()->each(function ($category)
		 { $category->products()->saveMany(factory(App\Product::class , 20)->make()); });
    }
}
