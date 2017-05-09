<?php
$factory->define(App\User::class, function () {
    $roFaker = Faker\Factory::create("ro_RO");
    static $password;

    return [
        'name' => $roFaker->name,
        'email' => $roFaker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
