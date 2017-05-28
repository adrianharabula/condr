<?php

use Illuminate\Database\Seeder;

class CharacteristicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      // characteristics for electronics (1,7)
      DB::table('characteristics')->insert([
          'name' => 'Processor', //value will be a (number.number) GHz
      ]);
      DB::table('characteristics')->insert([
          'name' => 'RAM Memory', //value will be a number RAM
        
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Dual core', //value will be yes or no
        
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Resolution', //value will be a number x number
        
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Contrast', //value will be a number:number
        
      ]);
      DB::table('characteristics')->insert([
          'name' => 'HD front camera', //value will be yes or no
        
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Surface', //value will be platic,alluminium,metal etc...
        
      ]);
      for($i=0;$i<=20;$i++){
          DB::table('characteristics')->insert([
              'name' => 'Char'.$i, //value will be platic,alluminium,metal etc...

          ]);
      }

      //
      //// characteristics for clothes and footwear (8,16)
      //DB::table('characteristics')->insert([
      //    'name' => 'Material', //value will be cotton, silk, leather etc...
      //    'category_id' => '2'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Texture', //value will be soft, harsh, grumpy etc...
      //    'category_id' => '2'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Washing temperature', //value will be a number
      //    'category_id' => '2'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Ironing temperature', //value will be a number
      //    'category_id' => '2'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Can use the washing machine', //value will be yes or no
      //    'category_id' => '2'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Slowly dry', //value will be yes or no
      //    'category_id' => '3'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Can combine with other clothes/footwear when washing', //value will be yes or no
      //    'category_id' => '2'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Size', //value will be a number
      //    'category_id' => '2'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Recommanded wearing season', //value will be winter/spring/summer/autumn
      //    'category_id' => '3'
      //]);
      //
      //// characteristics for food (17,24)
      //DB::table('characteristics')->insert([
      //    'name' => 'Taste', //value will be sour,sweet,chilli etc
      //    'category_id' => '4'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Smell', //value will be inodour,powerfull,sweet,good,bad etc
      //    'category_id' => '4'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Serving temperature', //value will be a number
      //    'category_id' => '4'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Found in my region', //value will be yes or no
      //    'category_id' => '4'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Can easily buy from supermarket', //value will be yes or no
      //    'category_id' => '4'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Is exotic food', //value will be yes or no
      //    'category_id' => '4'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Recipe is known', //value will be yes or no
      //    'category_id' => '4'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Contains', //value will be nuts,gluten,lactose etc...(possbile allergens) and the rest of the ingredients
      //    'category_id' => '4'
      //]);
      //
      //// characteristics for games (25,30)
      //DB::table('characteristics')->insert([
      //    'name' => 'Genre', //value will be sport,arcade,racing,fight etc...
      //    'category_id' => '5'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Co-player', //value will be yes or no
      //    'category_id' => '5'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Single player', //value will be yes or no
      //    'category_id' => '5'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Played in network', //value will be yes or no
      //    'category_id' => '5'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Needs previous versions', //value will be yes or no
      //    'category_id' => '5'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Needs Internet connection', //value will be yes or no
      //    'category_id' => '5'
      //]);
      //
      //// characteristics for education (31,35)
      //DB::table('characteristics')->insert([
      //    'name' => 'Needs founding', //value will be yes or no
      //    'category_id' => '7'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Needs paying back method', //value will be yes or no
      //    'category_id' => '7'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Abroad studying possibility', //value will be yes or no
      //    'category_id' => '7'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Scholarships offered', //value will be yes or no
      //    'category_id' => '7'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Won Grammy Prize', //value will be yes or no
      //    'category_id' => '7'
      //]);
      //
      //// characteristics for entertainment (36,40)
      //DB::table('characteristics')->insert([
      //    'name' => 'Playing tonight', //value will be yes or no
      //    'category_id' => '8'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Qualified to semi-finals', //value will be yes or no
      //    'category_id' => '8'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Live match', //value will be yes or no
      //    'category_id' => '8'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Tickets on sale', //value will be yes or no
      //    'category_id' => '8'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Ticket price', //value will be a number
      //    'category_id' => '8'
      //]);
      //
      //// characteristics for every item (41,44)
      //DB::table('characteristics')->insert([
      //    'name' => 'Price', //value will be a number
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Quality', //value will be good,best etc
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Shipping time', //value will be a number (of days)
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Shipping costs', //value will be a number
      //]);
      //
      //// characteristics for services (45,48)
      //DB::table('characteristics')->insert([
      //    'name' => 'Room service', //value will be yes or no
      //    'category_id' => '6'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Close to town center', //value will be yes or no
      //    'category_id' => '6'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Has direct connection', //value will be yes or no
      //    'category_id' => '6'
      //]);
      //DB::table('characteristics')->insert([
      //    'name' => 'Close to the beach', //value will be yes or no
      //    'category_id' => '6'
      //]);

      // etc.... mai adaugati voi....

    }
}
