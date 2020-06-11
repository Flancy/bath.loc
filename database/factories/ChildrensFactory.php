<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Children;
use Faker\Generator as Faker;

$factory->define(Children::class, function (Faker $faker) {
    return [
        'recording_date' => $faker->date($format = 'Y-m-d', $max = 'next sunday'),
        'full_name' => $faker->firstName . ' ' . $faker->lastName,
        'birth_date' => $faker->date($format = 'Y-m-d', $max = '-16 years'),
        'age' => '16',
        'certificate_date' => $faker->date($format = 'Y-m-d', '+2 years'),
        'full_name_parents' => 'Мама: ' . $faker->firstName . ' ' . $faker->lastName . '. Папа: ' . $faker->firstName . ' ' . $faker->lastName,
        'phone_number_parents' => 'Мама: ' . $faker->phoneNumber . '. Папа: ' . $faker->phoneNumber,
        'address' => $faker->city . ' ' . $faker->streetAddress,
        'payment_summ' => $faker->randomNumber(3),
        'payment_status' => 'Оплата полностью',
        'trainer_id' => $faker->numberBetween(1, 5)
    ];
});
