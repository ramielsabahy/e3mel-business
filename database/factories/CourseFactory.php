<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $levels = ['beginner', 'intermediate', 'high'];
        return [
            'name' => $this->faker->title(),
            'category_id' => Category::inRandomOrder()->first()->id,
            'description' => $this->faker->text(),
            'rating' => rand(0,5),
            'views' => rand(1,10000),
            'levels' => $levels[array_rand($levels)],
            'hours' => rand(1,1000),
            'is_active' => rand(0,1)
        ];
    }
}
