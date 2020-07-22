<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

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

// $factory->define(User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->email,
//     ];
// });

// $factory->define('App\Author', function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->email,
//         'password' => $faker->password,
//         'salt' => $faker->regexify('[A-Za-z0-9]{5}'),
//         'profile' => $faker->text
//     ];
// });

$factory->define('App\Post', function (Faker $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->text(100),
        'tags' => $faker->text(5),
        'status' => 'success',
        'author_id' => 1
    ];
});

$factory->define('App\Comment', function (Faker $faker) {
    return [
        'content' => $faker->text(100),
        'status' => 'success',
        'author_id' => 1,
        'email' => $faker->email,
        'url' => $faker->url,
        'post_id' => 1
    ];
});
