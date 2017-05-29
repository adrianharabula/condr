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
          'values' => '2.1 Ghz, 2.6 Ghz, 3.1 Ghz'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Processor', //value will be a (number.number) GHz
          'values' => '2.3 Ghz, 2.9 Ghz'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'RAM Memory', //value will be a number RAM
          'values' => '8GB'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'RAM Memory', //value will be a number RAM
          'values' => '16GB, 32GB'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Dual core', //value will be yes or no
          'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Dual core', //value will be yes or no
          'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Resolution', //value will be a number x number
          'values' => '1440x960'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Resolution', //value will be a number x number
          'values' => '1900x1440'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Contrast', //value will be a number:number
          'values' => '5000:1'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Contrast', //value will be a number:number
          'values' => '10000:1'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'HD front camera', //value will be yes or no
          'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'HD front camera', //value will be yes or no
          'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Surface', //value will be platic,alluminium,metal etc...
          'values' => 'plastic'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Surface', //value will be platic,alluminium,metal etc...
          'values' => 'alluminium'
      ]);
      DB::table('characteristics')->insert([
          'name' => 'Surface', //value will be platic,alluminium,metal etc...
          'values' => 'metal'
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
         'values' => 'cotton'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Material', //value will be cotton, silk, leather etc...
         'values' => 'silk'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Material', //value will be cotton, silk, leather etc...
         'values' => 'leather'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Texture', //value will be soft, harsh, grumpy etc...
         'values' => 'soft'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Texture', //value will be soft, harsh, grumpy etc...
         'values' => 'harsh'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Texture', //value will be soft, harsh, grumpy etc...
         'values' => 'grumpy'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Washing temperature', //value will be a number
         'values' => '90 Celsius degrees'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Washing temperature', //value will be a number
         'values' => '30 Celsius degrees'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Ironing temperature', //value will be a number
         'values' => '30 Celsius degrees'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Ironing temperature', //value will be a number
         'values' => '70 Celsius degrees'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Can use the washing machine', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Can use the washing machine', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Slowly dry', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Slowly dry', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Can combine with other clothes/footwear when washing', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Can combine with other clothes/footwear when washing', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Size', //value will be a number
         'values' => '36'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Size', //value will be a number
         'values' => '38'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Size', //value will be a number
         'values' => 'all'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Recommanded wearing season', //value will be winter/spring/summer/autumn
         'values' => 'autumn'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Recommanded wearing season', //value will be winter/spring/summer/autumn
         'values' => 'winter'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Recommanded wearing season', //value will be winter/spring/summer/autumn
         'values' => 'spring'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Recommanded wearing season', //value will be winter/spring/summer/autumn
         'values' => 'summer'
      ]);

      // characteristics for food (40,53)
      DB::table('characteristics')->insert([
         'name' => 'Taste', //value will be sour,sweet,chilli etc
         'values' => 'sour, sweet'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Taste', //value will be sour,sweet,chilli etc
         'values' => 'sweet'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Taste', //value will be sour,sweet,chilli etc
         'values' => 'sour'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Taste', //value will be sour,sweet,chilli etc
         'values' => 'chilli, sweet'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Smell', //value will be inodour,powerfull,sweet,good,bad etc
         'values' => 'odourless'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Smell', //value will be inodour,powerfull,sweet,good,bad etc
         'values' => 'powerfull'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Smell', //value will be inodour,powerfull,sweet,good,bad etc
         'values' => 'sweet'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Smell', //value will be inodour,powerfull,sweet,good,bad etc
         'values' => 'bad'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Serving temperature', //value will be a number
         'values' => '30 Celsius degrees'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Serving temperature', //value will be a number
         'values' => '0 Celsius degrees'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Found in my region', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Found in my region', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Can easily buy from supermarket', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Can easily buy from supermarket', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Is exotic food', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Is exotic food', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Recipe is known', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Recipe is known', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Contains', //value will be nuts,gluten,lactose etc...(possbile allergens) and the rest of the ingredients
         'values' => 'nuts'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Contains', //value will be nuts,gluten,lactose etc...(possbile allergens) and the rest of the ingredients
         'values' => 'gluten'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Contains', //value will be nuts,gluten,lactose etc...(possbile allergens) and the rest of the ingredients
         'values' => 'cocoa'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Contains', //value will be nuts,gluten,lactose etc...(possbile allergens) and the rest of the ingredients
         'values' => 'lactose'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Contains', //value will be nuts,gluten,lactose etc...(possbile allergens) and the rest of the ingredients
         'values' => 'salt'
      ]);

      // characteristics for games (54,67)
      DB::table('characteristics')->insert([
         'name' => 'Genre', //value will be sport,arcade,racing,fight etc...
         'values' => 'sport'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Genre', //value will be sport,arcade,racing,fight etc...
         'values' => 'racing'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Genre', //value will be sport,arcade,racing,fight etc...
         'values' => 'fight'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Co-player', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Co-player', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Single player', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Single player', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Played in network', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Played in network', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Needs previous versions', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Needs previous versions', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Needs Internet connection', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Needs Internet connection', //value will be yes or no
         'values' => 'no'
      ]);


      // characteristics for services (68,75)
      DB::table('characteristics')->insert([
         'name' => 'Room service', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Room service', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Close to town center', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Close to town center', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Has direct connection', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Has direct connection', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Close to the beach', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Close to the beach', //value will be yes or no
         'values' => 'no'
      ]);


      // characteristics for education (76,86)
      DB::table('characteristics')->insert([
         'name' => 'Needs founding', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Needs founding', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Needs paying back method', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Needs paying back method', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Abroad studying possibility', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Abroad studying possibility', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Scholarships offered', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Scholarships offered', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Won Grammy Prize', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Won Grammy Prize', //value will be yes or no
         'values' => 'no'
      ]);

      // characteristics for entertainment (87,98)
      DB::table('characteristics')->insert([
         'name' => 'Playing tonight', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Playing tonight', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Qualified to semi-finals', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Qualified to semi-finals', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Live match', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Live match', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Tickets on sale', //value will be yes or no
         'values' => 'yes'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Tickets on sale', //value will be yes or no
         'values' => 'no'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Ticket price', //value will be a number
         'values' => '100e'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Ticket price', //value will be a number
         'values' => '80e'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Ticket price', //value will be a number
         'values' => 'from 20e'
      ]);

      // characteristics for every item (99,109)
      DB::table('characteristics')->insert([
         'name' => 'Price', //value will be a number
         'values' => '30e'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Price', //value will be a number
         'values' => '70e'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Price', //value will be a number
         'values' => '80e'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Price', //value will be a number
         'values' => '180e'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Quality', //value will be good,best etc
         'values' => 'good'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Quality', //value will be good,best etc
         'values' => 'best'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Shipping time', //value will be a number (of days)
         'values' => '6-7 days'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Shipping time', //value will be a number (of days)
         'values' => '2-5 days'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Shipping costs', //value will be a number
         'values' => '10e'
      ]);
      DB::table('characteristics')->insert([
         'name' => 'Shipping costs', //value will be a number
         'values' => '5e'
      ]);


      // etc.... mai adaugati voi....

    }
}
