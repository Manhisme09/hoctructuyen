@extends('layouts.app')

@section('content')
<div class="container-fluid allcourse-body">
    <div class="allcourse">
        <div class="row">
            <div class="col-1 mr-5 pl-0">
                <button class="btn-filter">
                    <i class="fa-solid fa-arrow-down-wide-short"></i>
                    {{ __('course.filter') }}
                </button>
            </div>
            <form action="{{ route('courses.index') }}" method="GET">
                <div class="form-search">
                    <div class="col-8 box-search">
                        <input type="text" class="input-search" id="search-ajax" name="key_search"
                            placeholder="{{ __('course.search') }}..." @if(isset($data['key_search']))
                            value="{{ $data['key_search'] }}" @endif>
                        <button type="submit" name="submit" value="Search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>

                    <div class="col-1">
                        <button class="btn-search" type="submit" name="submit" value="Search">{{ __('course.search')
                            }}</button>
                    </div>
                </div>
                <div class="wrap_suggest" id="show_search">
                </div>
                <div class="filter">
                    <div class="row ">
                        <div class="title">{{ __('course.filter_by') }}</div>
                        <div class="element">
                            <div class="form-group filter-item">
                                <input type="radio" id="newest" name="created_time" value="newest"
                                    class="form-control hidden" @if( !isset($data['created_time']) ||
                                    $data['created_time']=='newest' ) checked @endif>
                                <label for="newest" class="newest">{{ __('course.last_est') }}</label>
                            </div>
                            <div class="form-group filter-item">
                                <input type="radio" id="oldest" name="created_time" value="oldest"
                                    class="form-control hidden" @if(isset($data['created_time']) &&
                                    $data['created_time']=='oldest' ) checked @endif>
                                <label for="oldest" class="oldest">{{ __('course.old_est') }}</label>
                            </div>
                            <div class="form-group filter-item select">
                                <select class="js-select2 one" name="reviews">
                                    <option value="" selected>{{ __('course.review') }}</option>
                                    <option value="asc" @if(isset($data['reviews']) && $data['reviews']=='asc' )
                                        selected @endif>{{ __('course.ascending') }}</option>
                                    <option value="desc" @if(isset($data['reviews']) && $data['reviews']=='desc' )
                                        selected @endif>{{ __('course.descending') }}</option>
                                </select>
                            </div>
                            <div class="form-group filter-item select">
                                <select class="js-select2 one" name="learners">
                                    <option value="" selected>{{ __('course.student_number') }}</option>
                                    <option value="asc" @if(isset($data['learners']) && $data['learners']=='asc' )
                                        selected @endif>{{ __('course.ascending') }}</option>
                                    <option value="desc" @if(isset($data['learners']) && $data['learners']=='desc' )
                                        selected @endif>{{ __('course.descending') }}</option>
                                </select>
                            </div>
                            <div class="form-group filter-item select">
                                <select class="js-select2 one" name="times">
                                    <option value="" selected>{{ __('course.learn_time') }}</option>
                                    <option value="asc" @if(isset($data['times']) && $data['times']=='asc' ) selected
                                        @endif>{{ __('course.ascending') }}</option>
                                    <option value="desc" @if(isset($data['times']) && $data['times']=='desc' ) selected
                                        @endif>{{ __('course.descending') }}</option>
                                </select>
                            </div>
                            <div class="form-group filter-item select">
                                <select class="js-select2 one" name="lessons">
                                    <option value="" selected>{{ __('course.lesson_number') }}</option>
                                    <option value="asc" @if(isset($data['lessons']) && $data['lessons']=='asc' )
                                        selected @endif>{{ __('course.ascending') }}</option>
                                    <option value="desc" @if(isset($data['lessons']) && $data['lessons']=='desc' )
                                        selected @endif>{{ __('course.descending') }}</option>
                                </select>
                            </div>
                            <div class="form-group filter-item select">
                                <select
                                    class="js-select2 js-placeholder-multiple-{{ __('course.teacher') }} js-states more"
                                    id="teachers" name="teachers[]" multiple="multiple">
                                    @foreach ($teachers as $teacher )
                                    <option value="{{ $teacher->id }}" @if(isset($data['teachers']) &&
                                        in_array($teacher->id, $data['teachers']))
                                        selected @endif>{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group filter-item select">
                                <select class="js-select2 js-placeholder-multiple-tag js-states more" id="tags"
                                    name="tags[]" multiple="multiple">
                                    @foreach ($tags as $tag )
                                    <option value="{{ $tag->id }}" @if(isset($data['tags']) && in_array($tag->id,
                                        $data['tags']))
                                        selected @endif>{{ $tag->tag_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        @if (isset($_GET['submit']) && count($courses) != 0)
        <h5 class="find_title">{{ __('course.find') }} {{ count($courses) }} {{ __('course.courses') }}</h5>
        @endif
        <div class="row list-item ">
            @foreach ($courses as $course )
            <div class="col-6 mb-4">
                <div class="row">
                    <div class="col-11 box-item">
                        <div class="row course-item">
                            <div class="col-3">
                                <img class="img-item" src="{{ asset($course->image) }}" alt="">
                            </div>

                            <div class="col-8 item-content">
                                <div class="item-title">
                                    {{ $course->course_name }}
                                </div>
                                <div class="item-description">
                                    {{ substr($course->description, 0, 100) }}
                                </div>
                                <a href="{{ route('courses.show', [$course->id]) }}">
                                    <div class="btn-more">{{ __('course.more') }}</div>
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="course-learners">
                                    {{ __('course.learners') }}
                                </div>
                                <div class="course-number">
                                    {{ $course->total_learners }}
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="course-learners">
                                    {{ __('course.lessons') }}
                                </div>
                                <div class="course-number">
                                    {{ $course->total_lessons }}
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="course-learners">
                                    {{ __('course.times') }}
                                </div>
                                <div class="course-number">
                                    {{ $course->total_time}} (h)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @if(count($courses) == 0)
            <div>
                <h3>{{ __('course.no_course') }}</h3>
            </div>
            @endif
        </div>
        {{ $courses->appends(request()->input())->links() }}
    </div>
</div>
@endsection
