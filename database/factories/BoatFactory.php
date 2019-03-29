<?php

use Faker\Generator as Faker;

$factory->define(App\Boat::class, function (Faker $faker) {
    return [
        'year' => 2006,
        'make' => 'Boston Whaler',
        'model' => '205 Conquest',
        'list_price' => '2890000',
        'serial_number' => 'ABCD1234',
        'stock_number' => 'EFG45678',
    ];
});
