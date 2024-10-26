<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Catogry;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'title' => fake()->sentence(),
                "slug" =>Str::slug("title"),
                'descr' => fake()->text(),
                'status'=>rand(0,1),
                'comment_able'=>rand(0,1),
                "user_id" => User::inRandomOrder()->first()->id,
                "catogry_id" => Catogry::inRandomOrder()->first()->id,
        ];
    }
}
