<div class="col-12 course-related">
    <div class="course-related-title">{{
        __('course_show.other_courses')
        }}</div>
</div>
<div class="col-12 course-related-list">
    @foreach ( $otherCourses as $index => $course )
    <div class="course-related-detail">
        <div class="name"> <a href="{{ route('courses.show', [$course->id]) }}"><span>{{ $index+=1
                    }}.</span> {{ $course->course_name }}</a>
        </div>
    </div>
    @endforeach
    <div class="btn-view-all">
        <a href="{{ route('courses.index') }}" class="btn btn-hapo">{{
            __('course_show.view_all_courses')
            }}</a>
    </div>
</div>
