<?php

use Illuminate\Database\Seeder;

class CondrgroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('groups')->insert([
          'name' => 'FII@Iasi',
          'description' => 'This is where your sleepless nights begin!',
      ]);
      DB::table('groups')->insert([
          'name' => 'Food Lovers',
          'description' => 'Life has never tasted so good! Join us for the best recipes!',
      ]);
      DB::table('groups')->insert([
          'name' => 'PSGBD',
          'description' => 'Never ask a DBA to move furniture, they are known for dropping tables. :)',
      ]);
      DB::table('groups')->insert([
          'name' => 'Web Technologies',
          'description' => 'I know I am going to heaven, cause I am already in hell! *web dev life*',
      ]);
      DB::table('groups')->insert([
          'name' => 'Software Engeneering',
          'description' => 'We will teach you how to work in a company!',
      ]);
      DB::table('groups')->insert([
          'name' => 'Cat Lovers',
          'description' => 'Meow all the time',
      ]);
      DB::table('groups')->insert([
          'name' => 'Science',
          'description' => 'Come on, it is not like it is rocket science, they tell me..',
      ]);
      DB::table('groups')->insert([
          'name' => 'Education',
          'description' => 'Your future starts today!',
      ]);
      DB::table('groups')->insert([
          'name' => 'Highschool',
          'description' => 'Well, we still got time to do stupid things...',
      ]);
      DB::table('groups')->insert([
          'name' => 'Clothes Lovers',
          'description' => 'Never stop buying stuff!',
      ]);
      DB::table('groups')->insert([
          'name' => 'Fashion',
          'description' => 'Life is not perfect, but your outfit should be!',
      ]);
      DB::table('groups')->insert([
          'name' => 'Daily Entertainment',
          'description' => 'We will make you cry from laughing!',
      ]);
      DB::table('groups')->insert([
          'name' => 'Story of my life',
          'description' => '*Dont even need a description*',
      ]);
      DB::table('groups')->insert([
          'name' => 'IFL Science',
          'description' => 'Do not be an ignorant!',
      ]);
      DB::table('groups')->insert([
          'name' => 'Football Lovers',
          'description' => 'Gooooaaaaal!',
      ]);
      DB::table('groups')->insert([
          'name' => 'PC Garage',
          'description' => 'We are the best!',
      ]);
    }
}
