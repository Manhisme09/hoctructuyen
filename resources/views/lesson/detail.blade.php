@extends('layouts.app')

@section('content')
<div class="detail-lesson-overview">
    <div class="url-main">
        <div class="url-title">
            <nav aria-label="breadcrumb url-menu">
                <ol class="breadcrumb url-menu">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">{{ __('header.all_courses')
                            }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('courses.show', $course->id) }}">{{
                            __('header.course_detail') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('header.lesson_detail') }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="detail-lesson-content">
        <div class="row">
            <div class="col-8 content-main">
                <div class="image-course"><img src="{{ asset($course->image) }}" alt=""></div>
                <div class="lesson-infor">
                    <ul class="nav menu-lesson" id="myTab">
                        <li class="nav-item">
                            <a class="active" data-toggle="tab" href="#Descriptions">{{
                                __('lesson.descriptions')
                                }}</a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="tab" href="#Documents">{{
                                __('lesson.documents')
                                }}</a>
                        </li>
                    </ul>

                    <div class="border-bonus"></div>
                    <div class="tab-content">
                        @include('lesson.show_description')
                        @include('lesson.show_document')
                    </div>
                </div>
            </div>
            <div class="col-4 content-bonus">
                <div class="col-12 lesson-infor-title">
                    <div class="lesson-infor-title-item">
                        <div class="name"><span class="icon"><i class="fa-solid fa-desktop"></i></span>
                            <p>{{
                                __('course_show.course')
                                }}</p>
                        </div><span class="colon">:</span>
                        <div class="content">{{ $course->course_name }}</div>
                    </div>
                    <div class="lesson-infor-title-item">
                        <div class="name"><span class="icon"><i class="fa-solid fa-book-open"></i></span>
                            <p>{{
                                __('course_show.lesson')
                                }}</p>
                        </div><span class="colon">:</span>
                        <div class="content">{{ $lesson->lesson_name }}</div>
                    </div>
                    <div class="lesson-infor-title-item">
                        <div class="name"><span class="icon"><i class="fa-solid fa-users-line"></i></span>
                            <p>{{
                                __('course_show.learners')
                                }}</p>
                        </div>
                        <span class="colon">:</span>
                        <div class="content">{{ $course->total_learners }}</div>
                    </div>
                    <div class="lesson-infor-title-item">
                        <div class="name"><span class="icon"><i class="fa-regular fa-clock"></i></span>
                            <p>{{
                                __('course_show.times')
                                }}</p>
                        </div><span class="colon">:</span>
                        <div class="content"> {{ $course->total_time }} {{
                            __('course_show.hours')
                            }}</div>
                    </div>
                    <div class="lesson-infor-title-item">
                        <div class="name"><span class="icon"><i class="fa-regular fa-hashtag"></i></span>
                            <p>{{
                                __('course_show.tags')
                                }}</p>
                        </div><span class="colon">:</span>
                        <div class="content">
                            @foreach ($tags as $index => $tag )
                            @if ($index == (count($tags)-1))
                            <a href=""> #{{ $tag->tag_name }}</a>

                            @else
                            <a href="">#{{ $tag->tag_name }},</a>

                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="lesson-infor-title-item">
                        <div class="name"><span class="icon"><i class="fa-regular fa-money-bill-1"></i></span>Price
                        </div><span class="colon">:</span>
                        <div class="content"> {{ number_format($course->price) }} VNĐ</div>
                    </div>
                    @if ($course->isJoined->count() && !$course->isFinished->count())
                    <div class="lesson-infor-title-item">
                        <button class="btn btn-hapo btn-leave-course mx-auto bg-danger" data-toggle="modal"
                            data-target="#exampleModalCenter">
                            {{ __('course_show.end_course') }}
                        </button>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{ __('message.notification')
                                            }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{ __('message.alert_end') }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{
                                            __('message.no') }}</button>
                                        <form action=" {{ route('course-user.destroy', [$course->id]) }} "
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-primary">{{ __('message.yes') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @include('layouts.other_course')
            </div>
        </div>
    </div>
</div>
@endsection
