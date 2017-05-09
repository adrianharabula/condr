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

      // add user gabriela

      // add user elena
    }
}
