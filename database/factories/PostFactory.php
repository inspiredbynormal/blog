<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_title' => $this->faker->text(30),
            'post_slug' => Str::slug($this->faker->word()),
            'post_desc' => $this->faker->paragraphs(),
            'post_short_desc' => $this->faker->sentences(50),
            'post_image' => $this->faker->text(30),
            'category_id' => function () {
                return Category::inRandomOrder()->first()->id;
            },
            'user_id' => 1,
            'status' => 'publish',
        ];
    }
}
