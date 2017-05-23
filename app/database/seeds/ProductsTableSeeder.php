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
      DB::table('products')->delete();

      // add 100 random products
      // factory(\App\Product::class, 100)->create();

      $Faker = Faker\Factory::create("en_US");
      $companies = \App\Company::pluck('id');

      $electronics = ['Iphone 4','Iphone 5s','Iphone 5c','Iphone 6s','Iphone 6','Iphone 7','Iphone 4s','Iphone 3gs','Iphone 5',
                      'Samsung Galaxy S5','Samsung Galaxy S6','Asus Zenbook','Macbook Air 2013','Macbook Air 2014',
                      'Macbook Air 2015','Macbook Pro 2014','Macbook Air 2015','Macbook Air 2016','HP S903','Samsung LED TV',
                      'Toshiba FULL HD','DrDre headphones','Apple earpods'];
      for($i=0; $i<20; $i++) {
        DB::table('products')->insert([
            'upc_code' => $Faker->ean13,
            'name' => $electronics[$s = rand(0, count($electronics) - 1)],
            'description' => 'We give you the best ' .$electronics[$s]. ' in town!You can count on our electronics!',
            'image_url' => $Faker->imageUrl($width=300, $height=400 , 'technics'),
            'views' => rand(0,2000),
            'category_id' => 1,
            'company_id' => $companies[rand(0, count($companies) - 1)],
          ]);
      }


      $clothes = ['Pants','Blouse','Jacket','Hat','Sun glasses','Earrings','Chocker','T-shirt',
                      'Cardigan','Yoga pants','Skirt','Trousers','Belt','Handbag','Jeans','Bathing suit','Underwear','Bra'];
      for($i=0; $i<20; $i++) {
        DB::table('products')->insert([
            'upc_code' => $Faker->ean13,
            'name' => $clothes[$s = rand(0, count($clothes) - 1)],
            'description' => 'Life is not perfect,but your ' .$clothes[$s]. ' should be!',
            'image_url' => $Faker->imageUrl($width=300, $height=400 , 'fashion'),
            'views' => rand(0,2000),
            'category_id' => 2,
            'company_id' => $companies[rand(0, count($companies) - 1)],
          ]);
      }

      $footwear = ['Heeled shoes','Flat shoes','Casual shoes','Boots','Trainers','Platforms','Socks'];
      for($i=0; $i<10; $i++) {
        DB::table('products')->insert([
            'upc_code' => $Faker->ean13,
            'name' => $footwear[$s = rand(0, count($footwear) - 1)],
            'description' => 'Life is not perfect,but your ' .$footwear[$s]. ' should be!',
            'image_url' => $Faker->imageUrl($width=300, $height=400 , 'fashion'),
            'views' => rand(0,2000),
            'category_id' => 3,
            'company_id' => $companies[rand(0, count($companies) - 1)],
          ]);
      }

      $food = ['Sushi','Cooked Fish','Bolognese Spaghetti','Fruit salad','Ice-cream','Fresh juice','Kebab','Chicken Shaworma','Cocktails',
               'Milkshake','Grilled fish and vegetables','Grilled Chicken with french fries','Grilled pork meat with vegetables',
               'Burgers','Fillet-o-fish','Carbonara Spaghetti','Vegetables soup','Vegetarian Burger','Soya Sandwich',
               'Beaf stake with vegetables','Sausages with smashed potatoes','Beans and paprika','Chips','Chocolate'];
      for($i=0; $i<30; $i++) {
        DB::table('products')->insert([
            'upc_code' => $Faker->ean13,
            'name' => $food[$s = rand(0, count($food) - 1)],
            'description' => 'We offer you the best ' .$food[$s]. ' in town!',
            'image_url' => $Faker->imageUrl($width=300, $height=400 , 'food'),
            'views' => rand(0,2000),
            'category_id' => 4,
            'company_id' => $companies[rand(0, count($companies) - 1)],
          ]);
      }

      $games = ['Assasins Creed','GTA 4','GTA 5','Minecraft','World Of Warcraft','Overwatch','Pray','Mass Effect Andromeda','NBA Jam'];
      for($i=0; $i<20; $i++) {
        DB::table('products')->insert([
            'upc_code' => $Faker->ean13,
            'name' => $games[$s = rand(0, count($games) - 1)],
            'description' => 'We offer you the best quality games in town, in top with our new '.$games[$s].' game!',
            'image_url' => $Faker->imageUrl($width=300, $height=400 , 'abstract'),
            'views' => rand(0,2000),
            'category_id' => 5,
            'company_id' => $companies[rand(0, count($companies) - 1)],
          ]);
      }

      for($i=0; $i<100; $i++) {
        DB::table('products')->insert([
            'upc_code' => $Faker->ean13,
            'name' => $city = $Faker->unique()->city,
            'description' => 'Start a trip right now from ' .$city. ', taking advantage from our best services!',
            'image_url' => $Faker->imageUrl($width=300, $height=400 , 'city'),
            'views' => rand(0,2000),
            'category_id' => 6,
            'company_id' => $companies[rand(0, count($companies) - 1)],
          ]);
      }

      $education = ['Harry Potter by J.K.Rowling','Into the water by Paula Hawkings','the Dark Prophecy by Rick Riordan',
                    'Everything Everything by Nicola Yoon','The handmaids Tale by Margaret Atwood','16th Seduction by James Patterson',
                    'Lord of Shadows by Cassandra Clare','10 places you should visit in your life','History of Romania','Vlad Tepes Story',
                    'Summerschool in UK','Harvard Scholarship','MIT Internship','NASA Summerschool Programme'];
      for($i=0; $i<20; $i++) {
        DB::table('products')->insert([
            'upc_code' => $Faker->ean13,
            'name' => $education[$s = rand(0, count($education) - 1)],
            'description' => 'We offer you the best education, in top with our new '.$education[$s].' books and university programs!',
            'image_url' => $Faker->imageUrl($width=300, $height=400 , 'animals'),
            'views' => rand(0,2000),
            'category_id' => 7,
            'company_id' => $companies[rand(0, count($companies) - 1)],
          ]);
      }

      $entertainment = ['Football','Soccer','Volleyball','Golf','Running marathon','Scooba diving','Parachuting',
                        'Olympic Games','Racing pillot','Billiard'];
      for($i=0; $i<20; $i++) {
        DB::table('products')->insert([
            'upc_code' => $Faker->ean13,
            'name' => $entertainment[$s = rand(0, count($entertainment) - 1)],
            'description' => 'We offer you the best quality '.$entertainment[$s].' shows you can get!',
            'image_url' => $Faker->imageUrl($width=300, $height=400 , 'sports'),
            'views' => rand(0,2000),
            'category_id' => 8,
            'company_id' => $companies[rand(0, count($companies) - 1)],
          ]);
      }

      $others = ['Make-up products','Tooth brushes','Omega-3 Supplements','Calcium Supplements','Mineral&Vitamin Complex','Aloe Vera Gels',
                 'Tonic Face Water','Coconut bathing oils','Kitchen blenders','Kitchen hand mixers','Towels'];
      for($i=0; $i<20; $i++) {
        DB::table('products')->insert([
            'upc_code' => $Faker->ean13,
            'name' => $others[$s = rand(0, count($others) - 1)],
            'description' => 'We have the best  '.$others[$s].' that no one else does!',
            'image_url' => $Faker->imageUrl($width=300, $height=400 , 'abstract'),
            'views' => rand(0,2000),
            'category_id' => 9,
            'company_id' => $companies[rand(0, count($companies) - 1)],
          ]);
      }

    }
}
