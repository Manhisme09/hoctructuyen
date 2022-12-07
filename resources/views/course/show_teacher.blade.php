<div id="Teacher" class="tab-pane fade">
    <div class="teacher">
        <div class="main-teacher">Main Teachers</div>
        @foreach ($teachers as $teacher )
        <div class="teacher-detail">
            <div class="information-teacher">
                <div class="image"><img src="{{ $teacher->image }}" alt=""></div>
                <div class="infor-contact">
                    <div class="name">{{ $teacher->name }}</div>
                    <div class="phone">{{ $teacher->phone }}</div>
                    <div class="teacher-icon">
                        <div class="icon google"><i class="fa-brands fa-google-plus-g"></i>
                        </div>
                        <div class="icon facebook"><i class="fa-brands fa-facebook-f"></i></div>
                        <div class="icon slack"><i class="fa-brands fa-slack"></i></div>
                    </div>
                </div>
            </div>
            <div class="descriptions">{{ $teacher->about_me }}</div>
        </div>
        @endforeach
    </div>
</div>
