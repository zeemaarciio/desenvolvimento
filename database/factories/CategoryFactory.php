<?php

namespace Database\Factories;

use DevImobiliaria\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $faker->sentence(3);

        return [
            'title' => $tile,
            'slug' => str_slug($title)
        ];
    }
}
