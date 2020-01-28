<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\C_admin;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(C_admin::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('jatin@jatin'), // password
        // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'college' => 'college 1',
    ];
});
