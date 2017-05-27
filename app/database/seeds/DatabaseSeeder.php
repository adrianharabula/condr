<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CondrGroupsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CondrgroupUserTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        //$this->call(ProductUserTableSeeder::class);
        $this->call(CharacteristicsTableSeeder::class);
        $this->call(CharacteristicVoteTableSeeder::class);
        $this->call(ProductCharacteristicVoteTableSeeder::class);
        //$this->call(CharacterizablesTableSeeder::class);
    }
}
