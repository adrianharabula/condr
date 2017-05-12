<?php

use Illuminate\Database\Seeder;
use \App\Product as Product;
use \App\User as User;

class ProductUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
        DB::table('product_user')->delete();

        $products = Product::pluck('id');
        $users = User::pluck('id');

        for ($i = 0; $i < 20; $i++) {
          // select random user and product
          $user = User::find($users[rand(0, count($users) - 1)]);
          $product = Product::find($products[rand(0, count($products) - 1)]);

          // attach a relationship between them
          $user->products()->attach($product);
        }
    }
}
