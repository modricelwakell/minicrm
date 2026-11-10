<?php

// namespace App\Models;
namespace Database\Factories;
use App\Enums\ProjectStatus;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    public function definition(): array
    {
        $users = User::pluck('id');
        $clients = Client::pluck('id');

        return [
            'title'       => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'deadline'    => now()->addDays(rand(1, 30))->format('Y-m-d'),
            'status'      => fake()->randomElement(ProjectStatus::cases())->value,
            'user_id'     => $users->random(),
            'client_id'   => $clients->random(),
        ];
    }
}