<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => fake()->uuid(),
            'start_on' => fake()->date(),
            'pps_code' => fake()->randomNumber(4, true),
            'name' => fake()->company(),
            'disp_name' => fake()->company(),
            'user_id' => User::factory()->create()->id,
        ];
    }
}
