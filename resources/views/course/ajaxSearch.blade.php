@foreach ($courses as $course )

<ul class="list_search">
    <li>
        <a class="item-search" href="{{ route('courses.show', $course->id) }}">
            <div class="item-img"><img src="{{ $course->image }}" alt=""></div>

            <div class="suggest_item">
                <p class="name">{{ $course->course_name }}</p>
                <p>{{ Str::limit($course->description, 65) }}</p>
                <p>{{ number_format($course->price) }} VNĐ</p>
            </div>
        </a>
    </li>
</ul>

@endforeach
