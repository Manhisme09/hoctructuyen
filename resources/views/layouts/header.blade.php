<header class="main-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="logo-image" src="{{ asset('images/logo.png') }}" alt="HapoLearn Logo">
        </a>
        <div class="multi-lang-another">
            <button class="language">
                <span class="getLang">
                    @if (Session::get('language') == 'en'|| Session::get('language') == null)
                    <div class="flag-icon">
                        <img src="{{ asset('images/en.png') }}" alt="en" class="flag">
                        <span>English</span>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    @elseif (Session::get('language') == 'vi')
                    <div class="flag-icon">
                        <img src="{{ asset('images/vn.jpg') }}" alt="en" class="flag">
                        <span>VietNam</span>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    @endif
                </span>
            </button>
            <ul class="language-item">
                <li class="language-bar">
                    <a class="flag-icon" href="{{ route('language.index',['en']) }}">
                        <img src="{{ asset('images/en.png') }}" alt="EN" class="flag">
                        <span>English</span>
                    </a>
                </li>
                <li class="language-bar">
                    <a class="flag-icon" href="{{ route('language.index',['vi']) }}">
                        <img src="{{ asset('images/vn.jpg') }}" alt="VN" class="flag">
                        <span>VietNam</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto w-100">
                <li class="nav-item {{ (Request::route()->getName() == 'home') ? 'active-menu' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">{{ __('header.home') }}<span
                            class="sr-only">(current)</span></a>
                </li>
                <li
                    class="nav-item {{ ((Request::route()->getName() == 'courses.index') || (Request::route()->getName() == 'courses.show') ) ? 'active-menu' : '' }}">
                    <a class="nav-link" href="{{ route('courses.index') }}">{{ __('header.all_courses') }}</a>
                </li>
                @if(Auth::user())
                <li class="nav-item {{ (Request::route()->getName() == 'logout') ? 'active-menu' : '' }}">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn nav-link">{{ __('header.logout') }}</button>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.index') }}">{{ __('header.profile') }}</a>
                </li>
                @else
                <li
                    class="nav-item {{ ((Request::route()->getName() == 'login') || (Request::route()->getName() == 'register')) ? 'active-menu' : '' }}">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('header.login') }}/{{ __('header.register')
                        }}</a>
                </li>
                <li class="nav-item {{ (Request::route()->getName() == 'profile') ? 'active-menu' : '' }}">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('header.profile') }}</a>
                </li>
                @endif
                @if (Auth::user())
                <li>
                    <a class="nav-link hello">{{ __('header.hi') }}, {{Auth::user()->name}}</a>
                </li>
                @endif
                <div class="multi-lang">
                    <button class="language">
                        <span class="getLang">
                            @if (Session::get('language') == 'en'|| Session::get('language') == null)
                            <div class="flag-icon">
                                <img src="{{ asset('images/en.png') }}" alt="en" class="flag">
                                <span>English</span>
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                            @elseif (Session::get('language') == 'vi')
                            <div class="flag-icon">
                                <img src="{{ asset('images/vn.jpg') }}" alt="en" class="flag">
                                <span>VietNam</span>
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                            @endif
                        </span>
                    </button>
                    <ul class="language-item">
                        <li class="language-bar">
                            <a class="flag-icon" href="{{ route('language.index',['en']) }}">
                                <img src="{{ asset('images/en.png') }}" alt="EN" class="flag">
                                <span>English</span>
                            </a>
                        </li>
                        <li class="language-bar">
                            <a class="flag-icon" href="{{ route('language.index',['vi']) }}">
                                <img src="{{ asset('images/vn.jpg') }}" alt="VN" class="flag">
                                <span>VietNam</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </ul>
        </div>
    </nav>
</header>
