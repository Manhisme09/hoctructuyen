<div id="Lessons" class="tab-pane fade show active">
    <div class="function-course">
        <div class="search">
            <form action="{{ route('courses.show', [$course->id]) }}" method="GET">
                <div class="form-search row">
                    <div class="col-8 box-search">

                        <input type="text" class="input-search" name="key_search" placeholder="Search...">
                        <button type="submit" name="submit" value="Search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>

                    <div class="col-1">
                        <button class="btn-search" type="submit" name="submit" value="Search">{{
                            __('course.search')
                            }}</button>
                    </div>
                </div>
            </form>
        </div>
        <div>
            <form class="form-join" action="{{ route('course-user.store') }}" method="POST">
                @csrf
                @if($course->isJoined->count() && !$course->isFinished->count() )
                <div class="studying">{{ __('course_show.studying') }}</div>
                @endif
                @if(!$course->isJoined->count())
                <input type="hidden" name="course_id" value="{{ $course->id }}"
                    class="@error('course_id') is-invalid @enderror">
                <button type="submit" class="btn btn-hapo">{{ __('course_show.join_course') }}</button>
                @error('course_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                @endif
            </form>
            @if ($course->isJoined->count() && !$course->isFinished->count())
            <button class="btn btn-hapo btn-leave-course bg-danger" data-toggle="modal"
                data-target="#exampleModalCenter">
                {{ __('course_show.end_course') }}
            </button>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">{{ __('message.notification') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ __('message.alert_end') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('message.no')
                                }}</button>
                            <form action=" {{ route('course-user.destroy', [$course->id]) }} " method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-primary">{{ __('message.yes') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @elseif ($course->isFinished->count())
            <form action=" {{ route('course-user.update', [$course->id]) }} " method="POST">
                @csrf
                @method('put')
                <button class="btn btn-hapo">{{ __('course_show.join_again') }}</button>
            </form>
            @endif
        </div>
    </div>
    <div class="lessons-list">
        @foreach ($lessons as $index => $lesson )
        <div class="lessons-list-detail">
            <div class="name">
                <span>{{ (isset($data['page'])) ? ((($data['page'] - 1) * config('lesson.paginate')) + ($index + 1)) :
                    ($index + 1) }}.</span>
                {{ $lesson->lesson_name }}
            </div>
            <form action="{{ route('lesson-user.store') }}" method="POST">
                @csrf
                @if ($lesson->isLearned->count())
                <a href="{{ route('lessons.show', $lesson->id) }}" class="btn btn-hapo btn-learn learned">Xem</a>
                @else
                <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                <div class="learn"><button class="btn btn-hapo btn-learn">{{ __('course_show.learn')
                        }}</button></div>
                @endif
            </form>
        </div>
        @endforeach
    </div>
    {{ $lessons->appends(request()->input())->links() }}
</div>
