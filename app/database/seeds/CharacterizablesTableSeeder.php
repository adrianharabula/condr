<?php

use Illuminate\Database\Seeder;

class CharacterizablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // get electronics
        $ps = \App\Product::where('id', '>=', 1)
                                ->where('id', '<=', 20)->get();
        $cs = \App\Characteristic::where('id', '>=', 1)
                                ->where('id', '<=', 7)->get();

        $faker = Faker\Factory::create("en_US");
        
        for($i = 0; $i < 50; $i++) {
            $psr = $ps[rand(0, count($ps) - 1)];
            $csr = $cs[rand(0, count($cs) - 1)];

            $words = $faker->words(rand(1, 5));
            $words = implode(', ', $words);

            $psr->characteristics()->attach($csr, ['characteristic_values' => $words]);
        }

    }
}
