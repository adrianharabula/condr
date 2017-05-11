<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // add user adrian
      DB::table('users')->insert([
          'name' => 'Adrian Harabulă',
          'email' => 'adrian.harabula@gmail.com',
          'password' => bcrypt('adrian'),
      ]);

      // add user elisa
      DB::table('users')->insert([
          'name' => 'Elisa Aioanei',
          'email' => 'elisa.aioanei@yahoo.com',
          'password' => bcrypt('elisa'),
      ]);
      // add user gabriela
      DB::table('users')->insert([
          'name' => 'Madalina Buza',
          'email' => 'madalina.buza@gmail.com',
          'password' => bcrypt('madalina'),
      ]);

      // add user elena
      DB::table('users')->insert([
          'name' => 'Anghelina Elena',
          'email' => 'anghelinaelena96@gmail.com',
          'password' => bcrypt('elena'),
      ]);


      // add 50 random users
      factory(App\User::class, 50)->create();
    }
}
