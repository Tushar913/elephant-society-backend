<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Society>
 */
class SocietyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            "name" => "Gokuldham Society",
            "registration_no" => "123456",
            "address" => "Powder Gali, Film City Road, Goregaon, Mumbai, Maharashtra",
            "no_wings" => "4",
            "no_car_parks" => "0",
            "no_bike_parks" => "10",
            "gardens" => "1",
        ];
    }
}
