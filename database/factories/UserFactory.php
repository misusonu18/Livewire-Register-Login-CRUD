<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$wVfiGGbYngeV4MWDtkH.yuSebp4zLWtjvdgEAcgi7jHXXd37gIlyy', // 123456
            'remember_token' => Str::random(10),
        ];
    }
}
