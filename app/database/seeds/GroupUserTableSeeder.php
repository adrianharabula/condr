<?php

use Illuminate\Database\Seeder;
use \App\Condrgroup as Group;
use \App\User as User;

class GroupUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
        DB::table('condrgroup_user')->delete();

        $faker = Faker\Factory::create();

        $groups = Group::pluck('id');
        $last_group = count($groups) - 1;

        $users = User::pluck('id');
        $last_user = count($users) - 1;

        for ($i = 0; $i < 20; $i++) {
          $user = User::find($users[rand(0,$last_user)]);
          $group = Group::find($groups[rand(0,$last_group)]);

          $user->groups()->attach($group);
        }
    }
}
