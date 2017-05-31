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

      // characteristics for electronics (1,15)
      DB::table('characteristics')->insert([
          'name' => 'Processor', //value will be a (number.number) GHz
          'values' => '2.1 Ghz, 2.6 Ghz, 3.1 Ghz',
          'category_id' => '1'

      ]);
      DB::table('characteristics')->insert([
          'name' => 'Processor', //value will be a (number.number) GHz
          'values' => '2.3 Ghz, 2.9 Ghz',
          'category_id' => '1'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'RAM Memory', //value will be a number RAM
          'values' => '8GB',
          'category_id' => '1'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'RAM Memory', //value will be a number RAM
          'values' => '16GB, 32GB',
          'category_id' => '1'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Dual core', //value will be yes or no
          'values' => 'yes',
          'category_id' => '1'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Dual core', //value will be yes or no
          'values' => 'no',
          'category_id' => '1'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Resolution', //value will be a number x number
          'values' => '1440x960',
          'category_id' => '1'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Resolution', //value will be a number x number
          'values' => '1900x1440',
          'category_id' => '1'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Contrast', //value will be a number:number
          'values' => '5000:1',
          'category_id' => '1'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Contrast', //value will be a number:number
          'values' => '10000:1',
          'category_id' => '1'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'HD front camera', //value will be yes or no
          'values' => 'yes',
          'category_id' => '1'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'HD front camera', //value will be yes or no
          'values' => 'no',
          'category_id' => '1'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Surface', //value will be platic,alluminium,metal etc...
          'values' => 'plastic',
          'category_id' => '1'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Surface', //value will be platic,alluminium,metal etc...
          'values' => 'alluminium',
          'category_id' => '1'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Surface', //value will be platic,alluminium,metal etc...
          'values' => 'metal',
          'category_id' => '1'
      ]);

      // for($i=0;$i<=20;$i++){
      //     DB::table('characteristics')->insert([
      //         'name' => 'Char'.$i, //value will be platic,alluminium,metal etc...
      //
      //     ]);
      // }


      // characteristics for clothes and footwear (16,39)
      DB::table('characteristics')->insert([
         'name' => 'Material', //value will be cotton, silk, leather etc...
         'values' => 'cotton',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Material', //value will be cotton, silk, leather etc...
         'values' => 'silk',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Material', //value will be cotton, silk, leather etc...
         'values' => 'leather',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Texture', //value will be soft, harsh, grumpy etc...
         'values' => 'soft',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Texture', //value will be soft, harsh, grumpy etc...
         'values' => 'harsh',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Texture', //value will be soft, harsh, grumpy etc...
         'values' => 'grumpy',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Washing temperature', //value will be a number
         'values' => '90 Celsius degrees',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Washing temperature', //value will be a number
         'values' => '30 Celsius degrees',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Ironing temperature', //value will be a number
         'values' => '30 Celsius degrees',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Ironing temperature', //value will be a number
         'values' => '70 Celsius degrees',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Can use the washing machine', //value will be yes or no
         'values' => 'yes',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Can use the washing machine', //value will be yes or no
         'values' => 'no',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Slowly dry', //value will be yes or no
         'values' => 'yes',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Slowly dry', //value will be yes or no
         'values' => 'no',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Can combine with other clothes/footwear when washing', //value will be yes or no
         'values' => 'yes',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Can combine with other clothes/footwear when washing', //value will be yes or no
         'values' => 'no',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Size', //value will be a number
         'values' => '36',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Size', //value will be a number
         'values' => '38',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Size', //value will be a number
         'values' => 'all',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Recommanded wearing season', //value will be winter/spring/summer/autumn
         'values' => 'autumn',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Recommanded wearing season', //value will be winter/spring/summer/autumn
         'values' => 'winter',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Recommanded wearing season', //value will be winter/spring/summer/autumn
         'values' => 'spring',
         'category_id' => '2'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Recommanded wearing season', //value will be winter/spring/summer/autumn
         'values' => 'summer',
         'category_id' => '2'
      ]);

      // characteristics for food (40,53)
      DB::table('characteristics')->insert([
         'name' => 'Taste', //value will be sour,sweet,chilli etc
         'values' => 'sour, sweet',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Taste', //value will be sour,sweet,chilli etc
         'values' => 'sweet',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Taste', //value will be sour,sweet,chilli etc
         'values' => 'sour',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Taste', //value will be sour,sweet,chilli etc
         'values' => 'chilli, sweet',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Smell', //value will be inodour,powerfull,sweet,good,bad etc
         'values' => 'odourless',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Smell', //value will be inodour,powerfull,sweet,good,bad etc
         'values' => 'powerfull',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Smell', //value will be inodour,powerfull,sweet,good,bad etc
         'values' => 'sweet',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Smell', //value will be inodour,powerfull,sweet,good,bad etc
         'values' => 'bad',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Serving temperature', //value will be a number
         'values' => '30 Celsius degrees',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Serving temperature', //value will be a number
         'values' => '0 Celsius degrees',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Found in my region', //value will be yes or no
         'values' => 'yes',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Found in my region', //value will be yes or no
         'values' => 'no',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Can easily buy from supermarket', //value will be yes or no
         'values' => 'yes',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Can easily buy from supermarket', //value will be yes or no
         'values' => 'no',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Is exotic food', //value will be yes or no
         'values' => 'yes',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Is exotic food', //value will be yes or no
         'values' => 'no',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Recipe is known', //value will be yes or no
         'values' => 'yes',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Recipe is known', //value will be yes or no
         'values' => 'no',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Contains', //value will be nuts,gluten,lactose etc...(possbile allergens) and the rest of the ingredients
         'values' => 'nuts',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Contains', //value will be nuts,gluten,lactose etc...(possbile allergens) and the rest of the ingredients
         'values' => 'gluten',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Contains', //value will be nuts,gluten,lactose etc...(possbile allergens) and the rest of the ingredients
         'values' => 'cocoa',
         'category_id' => '4'

      ]);
      DB::table('characteristics')->insert([
         'name' => 'Contains', //value will be nuts,gluten,lactose etc...(possbile allergens) and the rest of the ingredients
         'values' => 'lactose',
         'category_id' => '4'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Contains', //value will be nuts,gluten,lactose etc...(possbile allergens) and the rest of the ingredients
         'values' => 'salt',
         'category_id' => '4'
      ]);

      // characteristics for games (54,67)
      DB::table('characteristics')->insert([
         'name' => 'Genre', //value will be sport,arcade,racing,fight etc...
         'values' => 'sport',
         'category_id' => '5'

      ]);
      DB::table('characteristics')->insert([
         'name' => 'Genre', //value will be sport,arcade,racing,fight etc...
         'values' => 'racing',
         'category_id' => '5'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Genre', //value will be sport,arcade,racing,fight etc...
         'values' => 'fight',
         'category_id' => '5'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Co-player', //value will be yes or no
         'values' => 'yes',
         'category_id' => '5'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Co-player', //value will be yes or no
         'values' => 'no',
         'category_id' => '5'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Single player', //value will be yes or no
         'values' => 'yes',
         'category_id' => '5'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Single player', //value will be yes or no
         'values' => 'no',
         'category_id' => '5'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Played in network', //value will be yes or no
         'values' => 'yes',
         'category_id' => '5'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Played in network', //value will be yes or no
         'values' => 'no',
         'category_id' => '5'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Needs previous versions', //value will be yes or no
         'values' => 'yes',
         'category_id' => '5'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Needs previous versions', //value will be yes or no
         'values' => 'no',
         'category_id' => '5'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Needs Internet connection', //value will be yes or no
         'values' => 'yes',
         'category_id' => '5'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Needs Internet connection', //value will be yes or no
         'values' => 'no',
         'category_id' => '5'
      ]);


      // characteristics for services (68,75)
      DB::table('characteristics')->insert([
         'name' => 'Room service', //value will be yes or no
         'values' => 'yes',
         'category_id' => '6'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Room service', //value will be yes or no
         'values' => 'no',
         'category_id' => '6'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Close to town center', //value will be yes or no
         'values' => 'yes',
         'category_id' => '6'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Close to town center', //value will be yes or no
         'values' => 'no',
         'category_id' => '6'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Has direct connection', //value will be yes or no
         'values' => 'yes',
         'category_id' => '6'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Has direct connection', //value will be yes or no
         'values' => 'no',
         'category_id' => '6'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Close to the beach', //value will be yes or no
         'values' => 'yes',
         'category_id' => '6'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Close to the beach', //value will be yes or no
         'values' => 'no',
         'category_id' => '6'
      ]);


      // characteristics for education (76,86)
      DB::table('characteristics')->insert([
         'name' => 'Needs founding', //value will be yes or no
         'values' => 'yes',
         'category_id' => '7'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Needs founding', //value will be yes or no
         'values' => 'no',
         'category_id' => '7'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Needs paying back method', //value will be yes or no
         'values' => 'yes',
         'category_id' => '7'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Needs paying back method', //value will be yes or no
         'values' => 'no',
         'category_id' => '7'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Abroad studying possibility', //value will be yes or no
         'values' => 'yes',
         'category_id' => '7'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Abroad studying possibility', //value will be yes or no
         'values' => 'no',
         'category_id' => '7'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Scholarships offered', //value will be yes or no
         'values' => 'yes',
         'category_id' => '7'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Scholarships offered', //value will be yes or no
         'values' => 'no',
         'category_id' => '7'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Won Grammy Prize', //value will be yes or no
         'values' => 'yes',
         'category_id' => '7'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Won Grammy Prize', //value will be yes or no
         'values' => 'no',
         'category_id' => '7'
      ]);

      // characteristics for entertainment (87,98)
      DB::table('characteristics')->insert([
         'name' => 'Playing tonight', //value will be yes or no
         'values' => 'yes',
         'category_id' => '8'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Playing tonight', //value will be yes or no
         'values' => 'no',
         'category_id' => '8'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Qualified to semi-finals', //value will be yes or no
         'values' => 'yes',
         'category_id' => '8'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Qualified to semi-finals', //value will be yes or no
         'values' => 'no',
         'category_id' => '8'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Live match', //value will be yes or no
         'values' => 'yes',
         'category_id' => '8'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Live match', //value will be yes or no
         'values' => 'no',
         'category_id' => '8'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Tickets on sale', //value will be yes or no
         'values' => 'yes',
         'category_id' => '8'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Tickets on sale', //value will be yes or no
         'values' => 'no',
         'category_id' => '8'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Ticket price', //value will be a number
         'values' => '100e',
         'category_id' => '8'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Ticket price', //value will be a number
         'values' => '80e',
         'category_id' => '8'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Ticket price', //value will be a number
         'values' => 'from 20e',
         'category_id' => '8'
      ]);

      // characteristics for every item (99,109)
      DB::table('characteristics')->insert([
         'name' => 'Price', //value will be a number
         'values' => '30e',
         'category_id' => '9'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Price', //value will be a number
         'values' => '70e',
         'category_id' => '9'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Price', //value will be a number
         'values' => '80e',
         'category_id' => '9'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Price', //value will be a number
         'values' => '180e',
         'category_id' => '9'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Quality', //value will be good,best etc
         'values' => 'good',
         'category_id' => '9'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Quality', //value will be good,best etc
         'values' => 'best',
         'category_id' => '9'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Shipping time', //value will be a number (of days)
         'values' => '6-7 days',
         'category_id' => '9'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Shipping time', //value will be a number (of days)
         'values' => '2-5 days',
         'category_id' => '9'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Shipping costs', //value will be a number
         'values' => '10e',
         'category_id' => '9'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Shipping costs', //value will be a number
         'values' => '5e',
         'category_id' => '9'
      ]);


      // etc.... mai adaugati voi....

    }
}
