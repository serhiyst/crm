<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'day_of_delivery' => $faker->dateTimeThisMonth,
        'client_id' => 1,
        'list' => $faker->sentence,
        'total' => $faker->randomDigitNotNull,
    ];
});
