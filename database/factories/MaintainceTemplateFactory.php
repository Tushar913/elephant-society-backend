<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MaintainceTemplate>
 */
class MaintainceTemplateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'per_sqrft_maintaince_cost' => 4,
            'per_sqrft_property_tax' => 2,
            'water_charges' => 12200,
            'per_two_wheeler_charges' => 200,
            'per_four_wheeler_charges' => 400,
            'due_day' => "2",
        ];
    }
}
