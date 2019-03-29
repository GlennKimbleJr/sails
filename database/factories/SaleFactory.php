<?php

use App\Boat;
use Faker\Generator as Faker;

$factory->define(App\Sale::class, function (Faker $faker) {
    return [
        'boat_id' => function () {
            return factory(Boat::class)->create()->id;
        },
        'price' => 2500,
        'status' => 'quoted',
    ];
});
