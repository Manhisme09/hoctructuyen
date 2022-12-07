<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CoursesTableSeeder::class);
        $this->call(LessonsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(CourseUserTableSeeder::class);
        $this->call(CourseTeacherTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(CourseTagTableSeeder::class);
        $this->call(ProgramsTableSeeder::class);
    }
}
