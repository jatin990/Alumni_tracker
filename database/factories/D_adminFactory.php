<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\D_admin;
use Faker\Generator as Faker;

$factory->define(D_admin::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => Hash::make('jatin@jatin'),
    ];
});
