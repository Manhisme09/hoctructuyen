<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Lesson;
use App\Models\Review;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $courses = Course::main()->get();
        $otherCourses = Course::other()->get();
        $reviews = Review::main()->get();
        $totalCourse = Course::count();
        $totalLesson = Lesson::count();
        $learners = CourseUser::learner()->get()->count();
        return view('home', compact('courses', 'otherCourses', 'reviews', 'totalCourse', 'totalLesson', 'learners'));
    }
}
