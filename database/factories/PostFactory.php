<?php

namespace Database\Factories;

use DevImobiliaria\Models\Post;
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
        $title = $faker->sentence(10);

        return [
            'title' => $title,
            'slug' => str_slug($title),
            'subtitle' => $faker->sentence(10),
            'description' => $faker->paragraph(5),
            'publish_at' => $faker->dateTime(),
            'category' => function() {
                return factory(\DevImobiliaria\Categories::class)->create()->id;
            },
        ];
    }
}
