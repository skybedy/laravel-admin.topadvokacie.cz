<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{


    protected $model = Customer::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElement(['Mr.', 'Mrs.', 'Ms.', 'Dr.', null]),
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'street' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'postcode' => $this->faker->postcode,
            'place_of_birth' => $this->faker->city,
            'date_of_birth' => $this->faker->date,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
