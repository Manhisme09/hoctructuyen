<?php

namespace App\Http\Middleware;

use App\Models\Course;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CanReview
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
        $course = Course::find($request['course_id']);
        if ($course->isReviewed->count() == 1) {
            return redirect()->back()->with('error', __('message.review_fail'));
        }
        return $next($request);
    }
}
