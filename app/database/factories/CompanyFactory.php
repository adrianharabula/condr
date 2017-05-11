<?php
$factory->define(App\Company::class, function () {
    $faker = Faker\Factory::create("en_US");

    return [
        'name' => $faker->unique()->company,
        'description' => $faker->catchPhrase,
        'views' => rand(1,1000),
    ];
});
