<?php

namespace Database\Seeders;

use App\Models\CourseTeacher;
use Illuminate\Database\Seeder;

class CourseTeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseTeacher::factory()->count(35)->create();
    }
}
