<?php

namespace App\Http\Middleware;

use App\Models\Program;
use Closure;
use Illuminate\Http\Request;

class CanJoinProgram
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
        $program = Program::find($request['program_id']);
        $course = $program->lesson->course;
        if ($course->isJoined->count() == 0 || $course->isFinished->count() == 1) {
            return redirect()->route('courses.show', $course->id)->with('error', __('message.learn_fail'));
        }
        return $next($request);
    }
}
