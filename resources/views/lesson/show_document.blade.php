<div id="Documents" class="tab-pane fade">
    <div class="program">
        <div class="title">{{ __('lesson.program') }}</div>
        <div class="learn-process">
            <label for="file" class="title">{{ __('lesson.learning_progress') }}</label>
            <progress id="file" value="{{ $lesson->progress }}" max="100"></progress> {{ $lesson->progress }}%
        </div>
        <div class="document-list">
            @foreach ($programs as $program)
            <div class="document-list-detail">
                <div class="name">
                    <div class="icon-file"><i class="fa-solid fa-file-{{ $program->type_file }}"></i></div>
                    <div class="name-file">{{ $program->type_file }}</div>
                    <div class="title-file">{{ $program->program_name }}</div>
                </div>
                <form action="{{ route('program-user.store') }}" method="POST">
                    @csrf
                    @if ($program->isLearned->count())
                    <a href="{{ $program->link }}" class="btn btn-hapo btn-preview previewed">{{ __('lesson.watch')
                        }}</a>
                    @else
                    <input type="hidden" name="program_id" value="{{ $program->id }}">
                    <input type="hidden" name="program_link" value="{{ $program->link }}">
                    <button type="submit" class="btn btn-hapo btn-preview">{{ __('lesson.learn') }}</button>
                    @endif
                </form>

            </div>
            @endforeach
        </div>
    </div>
</div>
