<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
          'name' => 'Electronics',
          'description' => 'Electronics can cover a large area of products that work based on electric devices, cables, circuits or others. Usually describes the house keeping or personal use devices that an user may need.',
      ]);
      DB::table('categories')->insert([
          'name' => 'Clothes',
          'description' => 'Clothes describe a category that includes jackets, sweaters, t-shirts, pants, skirts, hats, accesories and other clothing items.',
      ]);
      DB::table('categories')->insert([
          'name' => 'Footwear',
          'description' => 'Footwear category includes all items that someone may walk into, like heeled shoes, platforms, casual shoes, sport shoes and others.',
      ]);
      DB::table('categories')->insert([
          'name' => 'Food',
          'description' => 'Food describes a very large area consisting of fruits, vegetables, meat, lactates, specific recipes and others. Here you may find the best recipes for your regarding your allergies and tastes.',
      ]);
      DB::table('categories')->insert([
          'name' => 'Games',
          'description' => 'Games category includes games, recreational activities and relaxation technique in order to help you release the stress and gain a new fresh attitude.',
      ]);
      DB::table('categories')->insert([
          'name' => 'Services',
          'description' => 'Services describe a large area of interests that a person may need or want, like internet, TV cable, mobile services, electricity, water and others.',
      ]);
      DB::table('categories')->insert([
          'name' => 'Education',
          'description' => 'Education category consists of products that a person may need for educational purposes,like books, records, maps etc, but also includes services that an university can provide, like scholarships, training programs and other.',
      ]);
      DB::table('categories')->insert([
          'name' => 'Other',
          'description' => 'Here you find everything you could not find in the other categories!',
      ]);

    }
}
