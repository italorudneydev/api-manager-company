<?php

/** @var Factory $factory */

use App\Company;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'nome' => $faker->company,
        'cnpj' => $faker->unique()->numerify('########0001##'),
        'cep' => $faker->postcode,
    ];
});
