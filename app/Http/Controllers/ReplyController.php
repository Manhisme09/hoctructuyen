<?php

namespace App\Http\Controllers;

use App\Http\Requests\RepReviewEditRequest;
use App\Http\Requests\RepReviewRequest;
use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(RepReviewRequest $request)
    {
        Reply::create($request->all());
        return redirect()->back()->with('message', __('message.reply_review_successful'));
    }

    public function update(RepReviewEditRequest $request, $id)
    {
        $reply = Reply::find($id);
        $reply['content'] = $request['rep_content_edit'];
        $reply->save();
        return redirect()->back()->with('message', __('message.edit_review_successful'));
    }

    public function destroy($id)
    {
        Reply::destroy($id);
        return redirect()->back()->with('message', __('message.delete_review_successful'));
    }
}
