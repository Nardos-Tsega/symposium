<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conference>
 */
class ConferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startsAt = now()->addMonths(6);
        $endsAt = $startsAt->clone()->addDays(2);
        $cfpStartsAt = $startsAt->clone()->subMonths(3);
        $cfpEndsAt = $startsAt->clone()->subMonths(1);

        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'url' => fake()->url(),
            'location' => fake()->city(),
            'start_at' => $startsAt,
            'end_at' => $endsAt,
            'cfp_start_at' => $cfpStartsAt,
            'cfp_end_at' => $cfpEndsAt,
        ];
    }
}
