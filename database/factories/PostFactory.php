<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use function PHPSTORM_META\map;

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
            'category_id' => mt_rand(1,3),
            'penulis_id' => mt_rand(1,10),
            'judul' => fake()->sentence(mt_rand(2,5),true),
            'slug' => fake()->slug(2),
            'excerpt' => fake()->sentence(mt_rand(5,10), true),
            'isi' => collect(fake()->paragraphs(mt_rand(5,10)))->map(function($p){
                return "<p>$p</p>";
            })->implode(""),
        ];
    }
}
