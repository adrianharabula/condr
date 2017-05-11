<?php
$factory->define(\App\Company::class, function () {
    $roFaker = Faker\Factory::create("en_US");
    static $password;

    return [
        'name' => $roFaker->unique()->company,
        'description' => $roFaker->catchPhrase,
        'views' => rand(1,1000),
    ];
});
