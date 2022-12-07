<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'program_name' => $this->faker->name(),
            'file_type' => $this->faker->randomElement(['docx', 'mp4', 'pdf']),
            'lesson_id' => $this->faker->randomElement(Lesson::pluck('id')),
            'link' => $this->faker->url(),
        ];
    }
}
