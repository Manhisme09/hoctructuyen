<div id="Reviews" class="tab-pane fade">
    <div class="review">
        <div class="review-sum"> {{ $reviews->count() }} {{ __('course_show.reviews') }}</div>
        <div class="star">
            <div class="star-content">
                <p class="number">{{ $course->average_star }}</p>
                <div class="lose-star">
                    <div id="rateYoUser"></div>
                    <input type="hidden" id="number_star" value="{{ $course->average_star }}">
                </div>
                <p class="rating">{{ $reviews->count() }} Ratings</p>
            </div>

            <div class="star-review">

                <div class="star-review-item">
                    <div class="name">5 {{ __('course_show.stars') }}</div>
                    <div class="bar">
                        <div class="bar-item" style="width: {{  $course->percent_star5 }}%">
                        </div>
                    </div>
                    <div class="number">{{ $course->count_star_5 }}</div>
                </div>
                <div class="star-review-item">
                    <div class="name">4 {{ __('course_show.stars') }}</div>
                    <div class="bar">
                        <div class="bar-item" style="width: {{  $course->percent_star4 }}%">
                        </div>
                    </div>
                    <div class="number">{{ $course->count_star_4 }}</div>
                </div>
                <div class="star-review-item">
                    <div class="name">3 {{ __('course_show.stars') }}</div>
                    <div class="bar">
                        <div class="bar-item" style="width: {{  $course->percent_star3 }}%">
                        </div>
                    </div>
                    <div class="number">{{ $course->count_star_3 }}</div>
                </div>
                <div class="star-review-item">
                    <div class="name">2 {{ __('course_show.stars') }}</div>
                    <div class="bar">
                        <div class="bar-item" style="width: {{  $course->percent_star2 }}%">
                        </div>
                    </div>
                    <div class="number">{{ $course->count_star_2 }}</div>
                </div>
                <div class="star-review-item">
                    <div class="name">1 {{ __('course_show.stars') }}</div>
                    <div class="bar">
                        <div class="bar-item" style="width: {{  $course->percent_star1 }}%">
                        </div>
                    </div>
                    <div class="number">{{ $course->count_star_1 }}</div>
                </div>
            </div>
        </div>
        <div class="comment">
            @foreach ($reviews as $review)
            <div class="user-comment">
                <div class="user-comment-infor">
                    <div class="image"><img src="{{ asset($review->user->image) }}" alt=""></div>
                    <div class="name">{{ $review->user->name }}</div>
                    <div class="vote-star">
                        @php
                        $stars = $review->star;
                        @endphp
                        @for($i = 0; $i < $stars ; $i++) <p><i class="fa-solid fa-star"></i></p>
                            @endfor
                    </div>
                    <div class="time">
                        {{ $review->posted_time }}
                    </div>
                </div>
                <div class="content"> {{ $review->content }} </div>

                <div class="function-comment">
                    <div class="function-menu">
                        <div><i class="fa-solid fa-reply"></i>
                            <button class="btn-comment btn-reply" data-toggle="collapse"
                                href="#collapseExample{{ $review->id }}" role="button" aria-expanded="false"
                                aria-controls="collapseExample{{ $review->id }}">
                                {{ __('course_show.reply') }}</button>
                        </div>
                        @if ($review->user->id == Auth::id())

                        <div class="delete">
                            <span class="big-dot">●</span>
                            <button type="submit" class="btn-comment" data-toggle="modal" data-target="#exampleModal">
                                {{ __('course_show.delete') }}
                            </button>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ __('message.notification') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{ __('message.alert_delete') }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{
                                            __('message.no') }}</button>
                                        <form action="{{ route('reviews.destroy', [$review->id]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-primary">{{ __('message.yes')
                                                }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="edit">
                            <span class="big-dot">●</span>
                            <button class="btn-comment btn-edit">{{ __('course_show.edit') }}</button>
                            <form class="form-review-edit" action="{{ route('reviews.update',[$review->id]) }}"
                                method="POST">
                                @csrf
                                @method('put')
                                <textarea class="review-text @error('content_edit') is-invalid @enderror"
                                    name="content_edit" id="content_edit"></textarea>
                                @error('content_edit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input type="hidden" class="@error('star_edit') is-invalid @enderror" name="star_edit"
                                    id="voteStarEdit">

                                <div class="review-vote">
                                    <div class="vote">{{ __('course_show.vote') }}</div>
                                    <div class="click-star">
                                        <div id="rateYoEdit"></div>
                                    </div>
                                    <div class="name-star">({{ __('course_show.stars') }})</div>
                                </div>
                                @error('star_edit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="send">
                                    <button class="btn btn-hapo btn-send" type="submit">{{ __('course_show.send')
                                        }}</button>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>
                    <form class="form-rep-review collapse" id="collapseExample{{ $review->id }}"
                        action="{{ route('replys.store') }}" method="POST">
                        @csrf
                        <textarea class="review-text @error('content') is-invalid @enderror" name="content"
                            id="content"></textarea>
                        @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <input type="hidden" name="review_id" value="{{ $review->id }}">
                        @if (Auth::check())
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        @endif
                        <div class="send">
                            <button class="btn btn-hapo btn-send" type="submit">{{ __('course_show.send')
                                }}</button>
                        </div>
                    </form>
                </div>

                @foreach ($review->replies as $reply)
                <div class="rep">
                    <div class="border-bonus-rep"></div>
                    <div class="rep-comment">
                        <div class="image"><img src="{{ asset($reply->user->image) }}" alt=""></div>
                        <div class="name">{{ $reply->user->name }}</div>
                        <div class="time">
                            {{ $reply->created_time }}
                        </div>
                    </div>
                    <div class="content-rep"> {{ $reply->content }}</div>
                    <div class="function-comment item-reply">
                        <div class="function-menu item-reply">
                            @if ($reply->user->id == Auth::id())
                            <div class="delete-reply">
                                <span class="big-dot">●</span>
                                <form action="{{ route('replys.destroy', [$reply->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn-comment">
                                        {{ __('course_show.delete') }}</button>
                                </form>
                            </div>

                            <div class="edit">
                                <span class="big-dot">●</span>
                                <button class="btn-comment btn-rep-edit" data-toggle="collapse"
                                    href="#collapseExample{{ $reply->id }}" role="button" aria-expanded="false"
                                    aria-controls="collapseExample{{ $reply->id }}">{{ __('course_show.edit')
                                    }}</button>
                                <form class="form-rep-review-edit collapse" id="collapseExample{{ $reply->id }}"
                                    action="{{ route('replys.update',[$reply->id]) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <textarea class="review-text @error('rep_content_edit') is-invalid @enderror"
                                        name="rep_content_edit" id="rep_content_edit"></textarea>
                                    @error('rep_content_edit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="send">
                                        <button class="btn btn-hapo btn-send" type="submit">{{ __('course_show.send')
                                            }}</button>
                                    </div>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="border-bonus-review"></div>
            </div>

            @endforeach
        </div>
        <form class="form-review" action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <label for="">{{ __('course_show.message') }}</label>
            <br />
            <textarea class="review-text @error('content') is-invalid @enderror" name="content" id="content"></textarea>
            @error('content')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <input type="hidden" class="@error('star') is-invalid @enderror" name="star" id="voteStar">
            @if (Auth::check())
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            @endif
            <div class="review-vote">
                <div class="vote">{{ __('course_show.vote') }}</div>
                <div class="click-star">
                    <div id="rateYo"></div>
                </div>
                <div class="name-star">({{ __('course_show.stars') }})</div>
            </div>
            @error('star')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="send">
                <button class="btn btn-hapo btn-send" type="submit">{{ __('course_show.send')
                    }}</button>
            </div>
        </form>
    </div>
</div>
