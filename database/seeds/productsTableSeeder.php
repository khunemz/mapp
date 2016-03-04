<?php

use Illuminate\Database\Seeder;

class productsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0; $i<100; $i++) {
            DB::table('products')->insert([
                'productTitle' => $faker->unique()->name,
                'productCaption' => $faker->paragraph,
                'price' => random_int(1,9999),
                'image_id' => random_int(1,4),
                'category' => $faker->mimeType
            ]);
        }
    }
}
