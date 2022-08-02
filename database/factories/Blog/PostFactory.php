<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imagesNames = [
            '1.jpg',
            '2.jpg',
            '3.jpg',
            '4.jpg',
            '5.jpg',
        ];

        return [
            'title' => $this->faker->catchPhrase(),
            'content' => $this->faker->text(1500),
            'preview' => 'uploads/demo/blog/' . $this->faker->randomElement($imagesNames),
            'status' => Post::STATUS_ACTIVE,
            'category_id' => $this->faker->numberBetween(1, 15)
        ];
    }
}
