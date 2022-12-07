<?php

namespace App\Http\Middleware;

use App\Models\Lesson;
use Closure;
use Illuminate\Http\Request;

class CanJoinLesson
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $lesson = Lesson::find($request['lesson_id']);
        $course = $lesson->course;
        if ($course->isJoined->count() == 0 || $course->isFinished->count() == 1) {
            return redirect()->route('courses.show', $course->id)->with('error', __('message.learn_fail'));
        }
        return $next($request);
    }
}
