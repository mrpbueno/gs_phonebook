<?php

use App\Contact;
use Faker\Factory;
use Faker\Generator as Faker;

$faker = Factory::create('pt_BR');

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'department' => $faker->company,
        'phone_number_work' => $faker->numberBetween(21000000, 39999999),
        'phone_number_home' => $faker->numberBetween(21000000, 39999999),
        'phone_number_cell' => $faker->numberBetween(921000000, 969999999),
        'account_index' => 1,
    ];
});
