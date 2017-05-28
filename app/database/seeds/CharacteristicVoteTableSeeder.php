<?php

use Illuminate\Database\Seeder;

class CharacteristicVoteTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seed(1000);
    }


    private function seed($number)
    {
        for ($i = 0; $i <= $number; $i++) {
            DB::table('characteristic_vote')->insert([
                'vote' => rand(0, 1000)
            ]);
        }
    }
}
