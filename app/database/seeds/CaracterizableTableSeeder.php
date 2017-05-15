<?php

use Illuminate\Database\Seeder;

class CaracterizableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      // caracterizable for food with caracteristic_id(17,24)
      DB::table('characterizable')->insert([
          'characteristic_id' => 17,
          'characteristic_values' => 'sour',
          'characterizable_id' => 17,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 17,
          'characteristic_values' => 'salty',
          'characterizable_id' => 17,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 24,
          'characteristic_values' => 'chocolate',
          'characterizable_id' => 5,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 24,
          'characteristic_values' => 'nuts',
          'characterizable_id' => 5,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 24,
          'characteristic_values' => 'vanilla',
          'characterizable_id' => 5,
          'characterizable_type' => 'product',
      ]);
       DB::table('characterizable')->insert([
          'characteristic_id' => 18,
          'characteristic_values' => 'good',
          'characterizable_id' => 1,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 18,
          'characteristic_values' => 'sweet',
          'characterizable_id' => 6,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 24,
          'characteristic_values' => 'strawberries',
          'characterizable_id' => 10,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 19,
          'characteristic_values' => '80',
          'characterizable_id' => 2,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 24,
          'characteristic_values' => 'cherry tomatoes',
          'characterizable_id' => 3,
          'characterizable_type' => 'product',
      ]);
       DB::table('characterizable')->insert([
          'characteristic_id' => 24,
          'characteristic_values' => 'coconut',
          'characterizable_id' => 4,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 17,
          'characteristic_values' => 'steep',
          'characterizable_id' => 7,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 23,
          'characteristic_values' => 'yes',
          'characterizable_id' => 8,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 24,
          'characteristic_values' => 'chili',
          'characterizable_id' => 8,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 24,
          'characteristic_values' => 'alcohol',
          'characterizable_id' => 9,
          'characterizable_type' => 'product',
      ]);
       DB::table('characterizable')->insert([
          'characteristic_id' => 24,
          'characteristic_values' => 'natural dyes',
          'characterizable_id' => 9,
          'characterizable_type' => 'product',
      ]);
        DB::table('characterizable')->insert([
          'characteristic_id' => 24,
          'characteristic_values' => 'syrup',
          'characterizable_id' => 9,
          'characterizable_type' => 'product',
      ]);
        DB::table('characterizable')->insert([
          'characteristic_id' => 20,
          'characteristic_values' => 'yes',
          'characterizable_id' => 11,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 20,
          'characteristic_values' => 'yes',
          'characterizable_id' => 11,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 22,
          'characteristic_values' => 'no',
          'characterizable_id' => 11,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 17,
          'characteristic_values' => 'good',
          'characterizable_id' => 12,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 19,
          'characteristic_values' => '30',
          'characterizable_id' => 12,
          'characterizable_type' => 'product',
      ]);
       DB::table('characterizable')->insert([
          'characteristic_id' => 17,
          'characteristic_values' => 'good',
          'characterizable_id' => 13,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 19,
          'characteristic_values' => '30',
          'characterizable_id' => 13,
          'characterizable_type' => 'product',
      ]);
       DB::table('characterizable')->insert([
          'characteristic_id' => 20,
          'characteristic_values' => 'yes',
          'characterizable_id' => 14,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 21,
          'characteristic_values' => 'no',
          'characterizable_id' => 14,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 22,
          'characteristic_values' => 'yes',
          'characterizable_id' => 14,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 23,
          'characteristic_values' => 'yes',
          'characterizable_id' => 14,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 18,
          'characteristic_values' => 'good',
          'characterizable_id' => 14,
          'characterizable_type' => 'product',
      ]);
       DB::table('characterizable')->insert([
          'characteristic_id' => 18,
          'characteristic_values' => 'good',
          'characterizable_id' => 15,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 19,
          'characteristic_values' => '45',
          'characterizable_id' => 17,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 23,
          'characteristic_values' => 'yes',
          'characterizable_id' => 17,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 17,
          'characteristic_values' => 'salty',
          'characterizable_id' => 18,
          'characterizable_type' => 'product',
      ]);
      DB::table('characterizable')->insert([
          'characteristic_id' => 23,
          'characteristic_values' => 'no',
          'characterizable_id' => 19,
          'characterizable_type' => 'product',
      ]);
       DB::table('characterizable')->insert([
          'characteristic_id' => 23,
          'characteristic_values' => 'no',
          'characterizable_id' => 23,
          'characterizable_type' => 'product',
      ]);
        DB::table('characterizable')->insert([
          'characteristic_id' => 17,
          'characteristic_values' => 'sweet',
          'characterizable_id' => 24,
          'characterizable_type' => 'product',
      ]);
        DB::table('characterizable')->insert([
          'characteristic_id' => 21,
          'characteristic_values' => 'yes',
          'characterizable_id' => 24,
          'characterizable_type' => 'product',
      ]);
        DB::table('characterizable')->insert([
          'characteristic_id' => 24,
          'characteristic_values' => 'nuts',
          'characterizable_id' => 24,
          'characterizable_type' => 'product',
      ]);

        //caracterizable for games characteristic_id(25,30)
        DB::table('characterizable')->insert([
          'characteristic_id' => 25,
          'characteristic_values' => 'action',
          'characterizable_id' => 1,
          'characterizable_type' => 'product',
      ]);
        DB::table('characterizable')->insert([
          'characteristic_id' => 26,
          'characteristic_values' => 'yes',
          'characterizable_id' => 2,
          'characterizable_type' => 'product',
      ]);
         DB::table('characterizable')->insert([
          'characteristic_id' => 28,
          'characteristic_values' => 'yes',
          'characterizable_id' => 2,
          'characterizable_type' => 'product',
      ]);
          DB::table('characterizable')->insert([
          'characteristic_id' => 30,
          'characteristic_values' => 'no',
          'characterizable_id' => 3,
          'characterizable_type' => 'product',
      ]);
           DB::table('characterizable')->insert([
          'characteristic_id' => 30,
          'characteristic_values' => 'no',
          'characterizable_id' => 4,
          'characterizable_type' => 'product',
      ]);
           DB::table('characterizable')->insert([
          'characteristic_id' => 30,
          'characteristic_values' => 'no',
          'characterizable_id' => 5,
          'characterizable_type' => 'product',
      ]);
          DB::table('characterizable')->insert([
          'characteristic_id' => 25,
          'characteristic_values' => 'sport',
          'characterizable_id' => 9,
          'characterizable_type' => 'product',
      ]);
           DB::table('characterizable')->insert([
          'characteristic_id' => 30,
          'characteristic_values' => 'no',
          'characterizable_id' => 9,
          'characterizable_type' => 'product',
      ]);
      //caracterizable for footwear characteristic_id(8,16)
           DB::table('characterizable')->insert([
          'characteristic_id' => 15,
          'characteristic_values' => '37',
          'characterizable_id' => 1,
          'characterizable_type' => 'product',
      ]);
           DB::table('characterizable')->insert([
          'characteristic_id' => 15,
          'characteristic_values' => '38',
          'characterizable_id' => 1,
          'characterizable_type' => 'product',
      ]);
           DB::table('characterizable')->insert([
          'characteristic_id' => 16,
          'characteristic_values' => 'spring',
          'characterizable_id' => 1,
          'characterizable_type' => 'product',
      ]);
          DB::table('characterizable')->insert([
          'characteristic_id' => 16,
          'characteristic_values' => 'summer',
          'characterizable_id' => 1,
          'characterizable_type' => 'product',
      ]);
           DB::table('characterizable')->insert([
          'characteristic_id' => 8,
          'characteristic_values' => 'leather',
          'characterizable_id' => 2,
          'characterizable_type' => 'product',
      ]);
           DB::table('characterizable')->insert([
          'characteristic_id' => 8,
          'characteristic_values' => 'leather',
          'characterizable_id' => 3,
          'characterizable_type' => 'product',
      ]);
           DB::table('characterizable')->insert([
          'characteristic_id' => 16,
          'characteristic_values' => 'winter',
          'characterizable_id' => 4,
          'characterizable_type' => 'product',
      ]);
           DB::table('characterizable')->insert([
          'characteristic_id' => 8,
          'characteristic_values' => 'leather',
          'characterizable_id' => 5,
          'characterizable_type' => 'product',
      ]);
           DB::table('characterizable')->insert([
          'characteristic_id' => 16,
          'characteristic_values' => 'summer',
          'characterizable_id' => 6,
          'characterizable_type' => 'product',
      ]);
           DB::table('characterizable')->insert([
          'characteristic_id' => 8,
          'characteristic_values' => 'cotton',
          'characterizable_id' => 7,
          'characterizable_type' => 'product',
      ]);

    }
}
