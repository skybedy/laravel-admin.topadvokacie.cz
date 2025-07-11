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
            'title_before' => $this->faker->randomElement(['Mr.', 'Mrs.', 'Ms.', 'Dr.', null]),
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'title_after' => $this->faker->randomElement(['Mr.', 'Mrs.', 'Ms.', 'Dr.', null]),
            'street' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'postcode' => $this->faker->postcode,
            'pob' => $this->faker->city,
            'dob' => $this->faker->date,
            'gender' => $this->faker->randomElement(['M', 'Z']),
            'document_type' => $this->faker->randomElement([1, 2]),
            'document_number' => (string) $this->faker->numberBetween(100000, 99999999),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
