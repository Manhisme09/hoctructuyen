@extends('layouts.app')

@section('content')

<section>
    <div class="banner col-md-12">
        <div class="banner-title col-md-12">
            @include('alert.message')
            <p class="banner-title-first">{{ __('home.learn_anytime_anywhere') }} <br> <span>{{ __('home.at') }}
                    HapoLearn<span><img class="owl" src="{{ asset('images/owl.png') }}" alt=""></span>!</span>
            </p>
            <p class="banner-title-second">{{ __('home.interactive_lessons') }}, "on-the-go" <br> {{ __('home.practice')
                }}, {{ __('home.peer_support') }}.</p>
            <div class="btn-start">
                <a href=" {{ route('courses.index') }} " class="btn-start-title">{{ __('home.start_learning_now') }}</a>
            </div>
        </div>
    </div>
    <div class="banner-bonus"></div>
</section>

<section class="container courses">
    <div class="row courses">
        @foreach ( $courses as $item )
        <div class="course-one col-lg-4">

            <div class="card item">
                <div class="row no-gutters">
                    <div class="card-img-top col-lg-12 col-md-4">
                        <img src="{{ asset($item['image']) }}" class="logo-course" alt="">
                    </div>
                    <div class="card-body col-lg-12 col-md-8">
                        <h5 class="card-title">{{ $item['course_name'] }}</h5>
                        <p class="card-text">{{ substr($item['description'], 0, 80) }}</p>
                        <a href=" {{ route('courses.show', [$item->id]) }} " class="btn btn-hapo btn-take-course">{{
                            __('home.take_this_course') }}</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <div class="other-course">
        <p class="other-title">{{ __('home.other_courses') }}</p>
    </div>
    <div class="row courses other">
        @foreach ( $otherCourses as $item )
        <div class="course-other-one col-lg-4">
            <div class="card item">
                <div class="row no-gutters">
                    <div class="card-other-img-top col-lg-12 col-md-4">
                        <img src="{{ $item['image'] }}" class="logo-course" alt="">
                    </div>
                    <div class="card-body col-lg-12 col-md-8">
                        <h5 class="card-title">{{ $item['course_name'] }}</h5>
                        <p class="card-text">{{ substr($item['description'], 0, 70) }}</p>
                        <a href="{{ route('courses.show', [$item->id]) }}" class="btn btn-hapo btn-take-course">{{
                            __('home.take_this_course') }}</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="view-all">
        <a href="{{ route('courses.index') }}">{{ __('home.view_all_our_course') }} <i
                class="fa-solid fa-arrow-right-long"></i> </a>
    </div>
</section>

<section class="why-bg">
    <div class="container-fluid">
        <div class="row align-items-center ">
            <div class="col-lg-5 col-md-7 col-sm-12 why-content ">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h4 class="why-title">{{ __('home.why') }} HapoLearn?</h4>
                        <div class="rotate-laptop">
                            <img src="{{ asset('images/laptopmini.png') }}">
                        </div>
                    </div>
                </div>
                <div class="why-list">
                    <div class="why-item">
                        <i class="fa-solid fa-circle-check"></i><span class="why-text">{{ __('home.interactive_lessons')
                            }}, "on-the-go" {{ __('home.practice')
                            }}, {{ __('home.peer_support') }}.</span>
                    </div>
                    <div class="why-item">
                        <i class="fa-solid fa-circle-check"></i><span class="why-text">{{ __('home.interactive_lessons')
                            }}, "on-the-go" {{ __('home.practice')
                            }}, {{ __('home.peer_support') }}.</span>
                    </div>
                    <div class="why-item">
                        <i class="fa-solid fa-circle-check"></i><span class="why-text">{{ __('home.interactive_lessons')
                            }}, "on-the-go" {{ __('home.practice')
                            }}, {{ __('home.peer_support') }}.</span>
                    </div>
                    <div class="why-item">
                        <i class="fa-solid fa-circle-check"></i><span class="why-text">{{ __('home.interactive_lessons')
                            }}, "on-the-go" {{ __('home.practice')
                            }}, {{ __('home.peer_support') }}.</span>
                    </div>
                    <div class="why-item">
                        <i class="fa-solid fa-circle-check"></i><span class="why-text">{{ __('home.interactive_lessons')
                            }}, "on-the-go" {{ __('home.practice')
                            }}, {{ __('home.peer_support') }}.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-5 col-sm-12">
                <img src="{{ asset('images/computer.png') }}" alt="why" class="why-img">
            </div>
        </div>
    </div>
    <div class="feedback">
        <p class="feedback-title">{{ __('home.feedback') }}</p>
    </div>
    <div class="feedback-describe">
        {{ __('home.feedback_title') }}
    </div>
</section>

<section class="container">
    <div class="feedback-slider">
        @foreach ( $reviews as $item )
        <div class="feedback-item">
            <div class="feedback-content">
                <div class="title">
                    <p>
                        “{{ $item['content'] }}”
                    </p>
                </div>

            </div>
            <div class="feedback-user">
                <div class="image"><img src="{{ asset('images/user.png') }}" alt=""></div>
                <div class="infor">
                    <p class="name">{{ $item->user->name }}</p>
                    <p class="language">{{ $item->course->course_name }}</p>
                    <div class="evaluate">
                        @php
                        $stars = $item['star'];
                        @endphp
                        @for($i = 0; $i < $stars ; $i++) <i class="fa-solid fa-star"></i>
                            @endfor
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section>
    <div class="become-member">
        <div class="sologal">
            {{ __('home.become_a_member') }}
        </div>
        <div class="start">
            <p>{{ __('home.start_learning_now') }}</p>
        </div>
    </div>
</section>

<section class="container">
    <div class="row statistic">
        <div class="topic col-lg-12">
            <p>{{ __('home.statistic') }}</p>
        </div>
        <div class="statistic-content col-lg-12">
            <div class="row">
                <div class="statistic-item col-lg-4 col-md-4">
                    <p class="statistic-name">{{ __('home.courses') }}</p>
                    <p class="statistic-quantity">{{ number_format($totalCourse) }}</p>
                </div>
                <div class="statistic-item col-lg-4 col-md-4">
                    <p class="statistic-name">{{ __('home.lessons') }}</p>
                    <p class="statistic-quantity">{{ number_format($totalLesson) }}</p>
                </div>
                <div class="statistic-item col-lg-4 col-md-4">
                    <p class="statistic-name">{{ __('home.learners') }}</p>
                    <p class="statistic-quantity">{{ number_format($learners) }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
