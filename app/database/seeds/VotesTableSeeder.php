<?php

use Illuminate\Database\Seeder;

class VotesTableSeeder extends Seeder
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
            DB::table('votes')->insert([
                'value' => rand(0, 1000)
            ]);
        }
    }
}
