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
        $votes = \App\CharacteristicVote::pluck('id');

        for ($i = 0; $i < 20; $i++) {
            // select random user and product
            $product        = Product::find($products[ rand(0, count($products) - 1) ]);
            $characteristic = Characteristic::find($characteristics[ rand(0, count($characteristics) - 1) ]);
            $vote           = \App\CharacteristicVote::find($votes[ rand(0, count($votes) - 1) ]);
            // attach a relationship between them
            $product->characteristics()->attach(++$i,[
                'vote_id'=>++$i
            ]);
            //$characteristic->votes()->attach($vote);
        }
        //}
        //foreach ($rels as $rel) {
        //    $rel->update(['vote_id' => $rel->product_id]);
        //}
    }
}
