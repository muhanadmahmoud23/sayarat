<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TasksFactory extends Factory
{
    public function definition(): array
    {
        return [
            'subject' => fake()->name(),
            'task' => fake()->name(),
            'status' => 'PENDING',
            'manager_id' => 2,
            'user_id' => 2,
        ];
    }

}
