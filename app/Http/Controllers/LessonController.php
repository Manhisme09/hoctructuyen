<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show($id)
    {
        if (!is_numeric($id) || $id > Lesson::count()) {
            abort(404);
        }
        $lesson = Lesson::find($id);
        $programs = $lesson->programs;
        $course = $lesson->course;
        $tags = $course->tags;
        $otherCourses = Course::limit('3')->get();
        return view('lesson.detail', compact(['otherCourses', 'lesson', 'tags', 'course', 'programs']));
    }
}
