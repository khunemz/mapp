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
        for($i=0; $i<100; $i++) {
            DB::table('products')->insert([
                'productTitle' => str_random(20),
                'productCaption' => str_random(20),
                'price' => random_int(2,999),
                'image_id' => random_int(2,999),
                'category' => str_random(20)
            ]);
        }
    }
}
