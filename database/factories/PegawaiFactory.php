<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create(['role' => 'manajer']),
            'nip'=> fake()->numberBetween(1,1000),
            'nama' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'gaji' => $this->faker->numberBetween(1000, 10000),
            'password' => 12345678,
        ];
    }
}
