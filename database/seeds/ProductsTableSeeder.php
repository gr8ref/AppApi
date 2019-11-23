<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $variations = array();
       $products = [
                       [
                           'name' => "Proizvod1",
                           'description' => 'Ovo je samo opis jednog proizvoda',
                           'variations' => json_encode(
                           [
                           'units' => 21,
                           'price' => '10.10',
                           'color' => 'black'
                           ]),
                           'created_at' => new DateTime,
                           'updated_at' => null,
                       ],

                        [
                           'name' => "Proizvod2",
                           'description' => 'Ovo je samo opis jednog proizvoda',
                           'variations' => json_encode(
                           [
                           'units' => 0,
                           'price' => '30.10',
                           'color' => 'blue'
                           ]),
                           'created_at' => new DateTime,
                           'updated_at' => null,
                       ],
                        [
                           'name' => "Proizvod3",
                           'description' => 'Ovo je samo opis jednog proizvoda',
                           'variations' => json_encode(
                           [
                           'units' => 10,
                           'price' => '20.10',
                           'color' => 'white'
                           ]),
                           'created_at' => new DateTime,
                           'updated_at' => null,
                       ],
                   ];

                   DB::table('products')->insert($products);
    }
}
