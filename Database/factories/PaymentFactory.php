<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Modules\Payment\Entities\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        "description" => $faker->unique()->creditCardType,
        "min_value" => $faker->numberBetween(0, 2000),
        "discount" => $faker->numberBetween(0, 100),
        "addition" => $faker->numberBetween(0, 100)
    ];
});
