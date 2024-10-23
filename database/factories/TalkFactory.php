<?php

namespace Database\Factories;

use App\Enums\TalkType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Talk>
 */
class TalkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->sentence(),
            'length' => fake()->randomElement(['30', '60']),
            'type' => fake()->randomElement(TalkType::cases())->value,
            'abstract' => fake()->paragraph(),
            'organizer_notes' => fake()->paragraph(),
        ];
    }
}
