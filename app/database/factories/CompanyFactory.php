<?php

namespace Database\Factories;

use App\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->company,
            'cnpj' => $this->faker->unique()->numerify('########0001##'),
            'cep' => $this->faker->postcode,
        ];
    }
}
