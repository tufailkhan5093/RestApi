<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Product::create([
                'name' => $faker->word,
                'description' => $faker->paragraph,
                'meta_description' => $faker->paragraph,
                'keywords' => $faker->sentence,
                'price' => $faker->numerify,
                'max_price' => $faker->numerify,
                'discount_price' => $faker->numerify,
                'category'=>$faker->word,
                'image' => $faker->image('public/images',640,480, null, false),

            ]);
        };
    }
}
