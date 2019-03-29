<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => rand(1111111111, 9999999999),
        'address' => $faker->address,
        'city' => 'Tampa',
        'state' => 'FL',
        'country' => 'US',
        'postal_code' => '33624',
    ];
});
