<?php

use App\Characteristic;
use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCharacteristicVoteTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products        = Product::pluck('id');
        $characteristics = Characteristic::pluck('id');

        // for ($i = 0; $i < 20; $i++) {
        //     // select random user and product
        //     $product        = Product::find($products[ rand(0, count($products) - 1) ]);
        //     $characteristic = Characteristic::find($characteristics[ rand(0, count($characteristics) - 1) ]);
        //     $vote           = \App\CharacteristicVote::find($votes[ rand(0, count($votes) - 1) ]);
        //     // attach a relationship between them
        //     $product->characteristics()->attach(++$i,[
        //         'vote_id'=>++$i
        //     ]);
        //     //$characteristic->votes()->attach($vote);
        // }
        //}
        //foreach ($rels as $rel) {
        //    $rel->update(['vote_id' => $rel->product_id]);
        //}



        for ($i = 0; $i < 20; $i++) {
            // select random product
            $product        = Product::find($products[ rand(0, 20) ]);
            $characteristic = Characteristic::find($characteristics[ rand(0, 14) ]);
            // attach a relationship between them
            // $product->characteristics()->attach(++$i,[
            //     'vote_id'=>++$i
            // ]);
        }

        for ($i = 0; $i < 20; $i++) {
            // select random product
            $product        = Product::find($products[ rand(21, 50) ]);
            $characteristic = Characteristic::find($characteristics[ rand(15, 39) ]);
            // $vote           = \App\CharacteristicVote::find($votes[ rand(0, count($votes) - 1) ]);
            // // attach a relationship between them
            // $product->characteristics()->attach(++$i,[
            //     'vote_id'=>++$i
            // ]);
        }

        for ($i = 0; $i < 20; $i++) {
            // select random product
            $product        = Product::find($products[ rand(51, 80) ]);
            $characteristic = Characteristic::find($characteristics[ rand(40, 53) ]);
            // $vote           = \App\CharacteristicVote::find($votes[ rand(0, count($votes) - 1) ]);
            // // attach a relationship between them
            // $product->characteristics()->attach(++$i,[
            //     'vote_id'=>++$i
            // ]);
        }

        for ($i = 0; $i < 20; $i++) {
            // select random product
            $product        = Product::find($products[ rand(81, 100) ]);
            $characteristic = Characteristic::find($characteristics[ rand(54, 67) ]);
            // $vote           = \App\CharacteristicVote::find($votes[ rand(0, count($votes) - 1) ]);
            // // attach a relationship between them
            // $product->characteristics()->attach(++$i,[
            //     'vote_id'=>++$i
            // ]);
        }

        for ($i = 0; $i < 20; $i++) {
            // select random product
            $product        = Product::find($products[ rand(100, 200) ]);
            $characteristic = Characteristic::find($characteristics[ rand(68, 75) ]);
            // $vote           = \App\CharacteristicVote::find($votes[ rand(0, count($votes) - 1) ]);
            // $product->characteristics()->attach(++$i,[
            //     'vote_id'=>++$i
            // ]);
        }

        for ($i = 0; $i < 20; $i++) {
            // select random product
            $product        = Product::find($products[ rand(201, 220) ]);
            $characteristic = Characteristic::find($characteristics[ rand(76, 86) ]);
            // $vote           = \App\CharacteristicVote::find($votes[ rand(0, count($votes) - 1) ]);
            // $product->characteristics()->attach(++$i,[
            //     'vote_id'=>++$i
            // ]);
        }

        for ($i = 0; $i < 20; $i++) {
            // select random product
            $product        = Product::find($products[ rand(221, 240) ]);
            $characteristic = Characteristic::find($characteristics[ rand(87, 98) ]);
            // $vote           = \App\CharacteristicVote::find($votes[ rand(0, count($votes) - 1) ]);
            // $product->characteristics()->attach(++$i,[
            //     'vote_id'=>++$i
            // ]);
        }

        for ($i = 0; $i < 20; $i++) {
            // select random product
            $product        = Product::find($products[ rand(241, 260) ]);
            $characteristic = Characteristic::find($characteristics[ rand(99, 109) ]);
            // $vote           = \App\CharacteristicVote::find($votes[ rand(0, count($votes) - 1) ]);
            // $product->characteristics()->attach(++$i,[
            //     'vote_id'=>++$i
            // ]);
        }
    }
}
