<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'amount' => fake()->randomFloat(2, 10, 1000000),
            'sender_id' => fake()->numberBetween(1, User::count()),
            'receiver_id' => fake()->numberBetween(1, User::count())
        ];
    }
}
