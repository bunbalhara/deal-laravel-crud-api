<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use App\Models\Poduct;
use App\Models\Export;
use App\Models\Import;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Poduct::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'productId' => $faker->uuid,
        'price' => rand(100,1000),
        'amount' => rand(10, 1000),
        'description' => $faker->text(50),
    ];
});

$factory->define(Export::class, function (Faker $faker) {

    $productIds = \DB::table('poducts')->select('productId')->get();
    $productId = $faker->randomElement($productIds)->productId;

    return [
        'productId' => $productId,
        'amount' => rand(10, 100),
        'out_date'=>$faker->date('yy-m-d','now')
    ];
});

$factory->define(Import::class, function (Faker $faker) {

    $productIds = \DB::table('poducts')->select('productId')->get();
    $productId = $faker->randomElement($productIds)->productId;

    return [
        'productId' => $productId,
        'amount' => rand(10, 100),
        'in_date'=>$faker->date('yy-m-d','now')
    ];
});
