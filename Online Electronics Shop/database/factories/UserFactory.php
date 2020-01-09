<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'category_id' => 1,
        'brand_name' => 'iphone',
        'item_price' => 10000,
        'item_image' => 'bookImage\QZbj18CAdngVAcoHf6Z2.jfif',
        'item_description' => 'Nice'
    ];
});


