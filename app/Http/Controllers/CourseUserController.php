<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterCourseFormRequest;
use App\Models\Course;
use App\Models\CourseUser;
use Illuminate\Http\Request;

class CourseUserController extends Controller
{
    public function store(RegisterCourseFormRequest $request)
    {
        $course = Course::find($request['course_id']);
        $course->users()->attach(auth()->user()->id);
        return redirect()->back()->with('message', __('message.join_course_successful'));
    }

    public function update(Request $request, $id)
    {
        CourseUser::withTrashed()
            ->where('course_id', $id)->where('user_id', auth()->id())
            ->restore();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CourseUser::where([
            'course_id' => $id,
            'user_id' => auth()->id()
        ])->delete();
        return redirect()->route('courses.show', $id);
    }
}
