<?php
$factory->define(App\Product::class, function () {
    $Faker = Faker\Factory::create("en_US");

     $companies = \App\Company::pluck('id');
    // $category = \App\Category::pluck('id');
    //
    // for ($i = 0; $i < 20; $i++) {
    //
    //   $company = Company::find($companies[rand(0, count($companies) - 1)]);
    //   $category = Category::find($categories[rand(0, count($categories) - 1)]);

    // return [
    //     'upc_code' => $Faker->ean13,
    //     'name' => $city = $Faker->unique()->city,
    //     'description' => 'Start a trip right now from ' .$city. ', taking advantage from our best services!',
    //     'image_url' => $Faker->imageUrl($width=480, $height=320 , 'city'),
    //     'views' => rand(0,2000),
    //     'category_id' => 6,
    //     'company_id' => $companies[rand(0, count($companies) - 1)],
    //
    // ];
});
