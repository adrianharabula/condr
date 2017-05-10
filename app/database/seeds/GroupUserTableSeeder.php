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

        $groups = Group::pluck('id');
        $users = User::pluck('id');

        for ($i = 0; $i < 20; $i++) {
          // select random user and group
          $user = User::find($users[rand(0, count($groups) - 1)]);
          $group = Group::find($groups[rand(0, count($users) - 1)]);

          // attach a relationship between them
          $user->groups()->attach($group);
        }
    }
}
