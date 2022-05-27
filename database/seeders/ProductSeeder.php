<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Adidas Tokio Solar Hu Shoes',
            'price' => 1800000,
            'color' => 'Green',
            'description' => 'The latest partnership between Pharrell and NIGO has birthed the adidas TOKIO SOLAR HU, a piece of friendship for the ages.',
            'image' => 'adidas1.png',
            'brand_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => 'Adidas X9000L4 Shoes',
            'price' => 1540000,
            'color' => 'Black',
            'description' => 'These adidas X9000L Shoes are designed for the fast pace and high energy of our hyperconnected world.',
            'image' => 'adidas2.png',
            'brand_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => 'Nike LeBron 17 Fire Shoes',
            'price' => 2038000,
            'color' => 'Red',
            'description' => 'The LeBron 17 harnesses LeBron\'s strength and speed with containment and support for all-court domination.',
            'image' => 'nike1.png',
            'brand_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => 'Nike Zoomx Superrep Surge',
            'price' => 1777000,
            'color' => 'Black',
            'description' => 'The Nike ZoomX SuperRep Surge is built for classes and workouts that keep you moving. From the treadmill to the rowing machine to strength training.',
            'image' => 'nike2.png',
            'brand_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => 'Puma Mercedes-AMG Petronas',
            'price' => 2073000,
            'color' => 'Gray',
            'description' => 'In 1999, the iconic Speedcatwas unleashed to the public, bringing fast-paced F1 track style to the street, setting the tone for the race-inspired streetwear and the low profile trend.',
            'image' => 'puma1.png',
            'brand_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => 'Puma x Porsche Legacy RS-2K',
            'price' => 1800660,
            'color' => 'Black',
            'description' => 'PRODUCT STORY These PUMA x Porsche Legacy shoes are the ultimate in motorsport fashion. Featuring a bulky silhouette and a plush, moulded sockliner, plus bold PUMA and Porsche Legacy branding, you\'ll feel on trend, every step of the way.',
            'image' => 'puma2.png',
            'brand_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => 'New Balance 574 Core Men\'s',
            'price' => 1299000,
            'color' => 'Gray',
            'description' => 'The 574 Sport brings New Balance\'s newest running technology and a touch of current fashion into one shoe.',
            'image' => 'nb1.png',
            'brand_id' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => 'New Balance Fuelcell TC',
            'price' => 2391769,
            'color' => 'Red',
            'description' => 'Engineered to meet the demands of marathons and training runs alike, our FuelCell TC running shoe combines a fast and fierce feel with impressive durability.',
            'image' => 'nb2.png',
            'brand_id' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => 'Nike Jumpman Air Jordan 1 Mid',
            'price' => 1833524,
            'color' => 'Blue',
            'description' => 'The Air Jordan 1 Mid “Blue” is yet another crisp colorway of Michael Jordan’s signature shoe in its mid-top design.',
            'image' => 'nike3.png',
            'brand_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('products')->insert([
            'name' => 'Nike Jordan Max 200 Men\'s Shoe',
            'price' => 1438000,
            'color' => 'Red',
            'description' => 'With design elements inspired by the Air Jordan 4, the Jordan Max 200 brings a new level of Air to Jordan, for details anchored in legacy and comfort made for the future.',
            'image' => 'nike4.png',
            'brand_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}