<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lesson_name' => $this->faker->name(),
            'requirements' => $this->faker->name(),
            'description' => $this->faker->text(),
            'time' => rand(1, 5),
            'course_id' => $this->faker->randomElement(Course::pluck('id')),
        ];
    }
}
