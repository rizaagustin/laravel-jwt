<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Provider\Image;
use Faker\Factory as Faker;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $faker->addProvider(new Image($faker));

        foreach (range(1, 100) as $index) {
            $image = 'zHExqoFMVE62bYGRORyQtnzQ1Brysi2tt8UWlWma.jpg'; // Generate dummy image URL

            Product::create([
                'name' => $faker->sentence(3),
                'description' => $faker->paragraph(1),
                'price' => $faker->randomFloat(2, 10, 100),
                'stock' => $faker->numberBetween(0, 100),
                'image' => $image, // Save dummy image URL in database
            ]);
        }
    }
}
