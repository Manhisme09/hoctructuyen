@extends('layouts.app')

@section('content')
<div class="detail-course-overview">
    <div class="url-main">
        <div class="url-title">
            <nav aria-label="breadcrumb row">
                <ol class="breadcrumb url-menu">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">{{ __('header.all_courses')
                            }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('header.course_detail') }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="detail-course-content">
        @include('alert.message')
        @include('alert.error')
        <div class="row">
            <div class="col-8 content-main">
                <div class="image-course"><img src="{{ asset($course->image) }}" alt=""></div>
                <div class="course-infor">
                    <ul class="nav menu-course" id="myTab">
                        <li class="nav-item">
                            <a class="active" data-toggle="tab" href="#Lessons">{{ __('course_show.lesson') }}</a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#Teacher">{{ __('course_show.teacher') }}</a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#Reviews">{{ __('course_show.reviews') }}</a>
                        </li>
                    </ul>

                    <div class="border-bonus"></div>
                    <div class="tab-content">
                        @include('course.show_lesson')
                        @include('course.show_teacher')
                        @include('course.show_review')
                    </div>
                </div>
            </div>
            <div class="col-4 content-bonus">
                <div class="description">
                    <div class="description-title">{{
                        __('course_show.description_course')
                        }}</div>
                    <div class="description-content">
                        {{ $course->description }}
                    </div>
                </div>
                <div class="col-12 course-infor-title">
                    <div class="course-infor-title-item">
                        <div class="name"><span class="icon"><i class="fa-solid fa-desktop"></i></span>{{
                            __('course_show.course')
                            }}</div><span class="colon">:</span>
                        <div class="content">{{ $course->course_name }}</div>
                    </div>
                    <div class="course-infor-title-item">
                        <div class="name"><span class="icon"><i class="fa-solid fa-users"></i></span>
                            <p>{{
                                __('course_show.learners')
                                }}</p>
                        </div><span class="colon">:</span>
                        <div class="content">{{ $course->total_learners}}</div>
                    </div>
                    <div class="course-infor-title-item">
                        <div class="name"><span class="icon"><i class="fa-regular fa-calendar"></i></span>
                            <p>{{
                                __('course_show.lessons')
                                }}</p>
                        </div>
                        <span class="colon">:</span>
                        <div class="content">{{ $course->total_lessons }} {{
                            __('course_show.lesson')
                            }}</div>
                    </div>
                    <div class="course-infor-title-item">
                        <div class="name"><span class="icon"><i class="fa-regular fa-clock"></i></span>
                            <p>{{
                                __('course_show.times')
                                }}</p>
                        </div><span class="colon">:</span>
                        <div class="content"> {{ $course->total_time}} {{
                            __('course_show.hours')
                            }}</div>
                    </div>
                    <div class="course-infor-title-item">
                        <div class="name"><span class="icon"><i class="fa-regular fa-hashtag"></i></span>
                            <p>{{
                                __('course_show.tags')
                                }}</p>
                        </div><span class="colon">:</span>
                        <div class="content">@foreach ($tags as $index => $tag )
                            <a href="">#{{ $tag->tag_name }} </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="course-infor-title-item">
                        <div class="name"><span class="icon"><i class="fa-regular fa-money-bill-1"></i></span>
                            <p>{{
                                __('course_show.price')
                                }}</p>
                        </div><span class="colon">:</span>
                        <div class="content">{{ number_format($course->price) }} VNĐ</div>
                    </div>
                </div>
                @include('layouts.other_course')
            </div>
        </div>
    </div>
</div>
@endsection
