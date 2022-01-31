<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Generator as Faker;

class CreateTestProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i < 51; $i++) {
            $product = new Product;
            $product->setColumn('title', $faker->word);
            $product->setColumn('size', $faker->randomFloat(0, 25, 45));
            $product->setColumn('description', $faker->paragraph);
            $product->setColumn('price', $faker->randomFloat(0, 1000, 10000));
            $product->save();
        };

    }
}
