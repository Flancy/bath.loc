<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Trainer;
use Faker\Generator as Faker;

$factory->define(Trainer::class, function (Faker $faker) {
    return [
        'full_name' => $faker->firstName . ' ' . $faker->lastName,
        'phone_number' => $faker->phoneNumber,
    ];
});
