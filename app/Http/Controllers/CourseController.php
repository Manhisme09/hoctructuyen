<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $teachers = User::teachers()->get();
        $tags = Tag::get();

        $courses = Course::search($data)->paginate(config('course.paginate'));
        return view('course.index', compact('courses', 'teachers', 'tags', 'data'));
    }

    public function show(Request $request, $id)
    {
        if (!is_numeric($id) || $id > Course::count()) {
            abort(404);
        }
        $data = $request->all();
        $course = Course::find($id);
        $otherCourses = Course::other()->whereNotIn('id', [$id])->get();
        $lessons = $course->lessons()->search($data)->paginate(config('lesson.paginate'));
        $tags = $course->tags;
        $teachers = $course->teachers;
        $reviews = $course->reviews;
        return view('course.detail', compact('course', 'otherCourses', 'tags', 'lessons', 'teachers', 'reviews', 'data'));
    }

    public function ajaxSearch(Request $request)
    {
        $key = $request['key'];
        $courses = Course::searchAjax($key)->get();
        return view('course.ajaxSearch', compact('courses'));
    }
}
