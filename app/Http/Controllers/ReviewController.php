<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewEditRequest;
use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {
        Review::create($request->all());
        return redirect()->back()->with('message', __('message.review_successful'));
    }

    public function update(ReviewEditRequest $request, $id)
    {
        $review = Review::find($id);
        $review['content'] = $request['content_edit'];
        $review['star'] = $request['star_edit'];
        $review->save();
        return redirect()->back()->with('message', __('message.edit_review_successful'));
    }

    public function destroy($id)
    {
        Review::destroy($id);
        return redirect()->back()->with('message', __('message.delete_review_successful'));
    }
}
