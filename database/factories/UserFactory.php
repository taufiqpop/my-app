<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories;

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

$factory->define(User::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'email' => $this->faker->unique()->safeEmail,
        'username' => Str::slug($name),
        'password' => bcrypt('password'),
        'real_password' => 'password',
        'path' => null,
        'filename' => null,
        'filesize' => null,
        'is_active' => 1,
        'remember_token' => Str::random(10),
    ];
});
