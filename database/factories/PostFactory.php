<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory {

    protected $model = Post::class;

    public function definition()
    {
        return [
            "body" => $this->faker->paragraph,
            "created_at" => $this->faker->dateTimeBetween('now', '+1 years'),
        ];
    }

}
