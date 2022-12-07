<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonUserController extends Controller
{
    public function store(Request $request)
    {
        $lesson = Lesson::find($request['lesson_id']);
        $lesson->users()->attach(auth()->user()->id);
        return redirect()->route('lessons.show', $request['lesson_id']);
    }
}
