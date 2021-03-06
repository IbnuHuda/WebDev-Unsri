<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserCompany;
use Faker\Generator as Faker;

$factory->define(UserCompany::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'verification_code' => sha1(time()),
        'is_verified' => 1,
        'remember_token' => Str::random(10),
    ];
});
