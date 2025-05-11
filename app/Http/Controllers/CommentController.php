<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CommentController extends Controller
{
    public function add(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment();
        $comment->post_id = $postId;
        $comment->user_id = Auth()->user()->id;
        $comment->content = $request->input('content');
        $comment->save();

        Alert::success('Success', 'Added comment successfully');

        return back();
    }

    public function edit($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        return view('home.editComment', compact('comment'));
    }

    public function update(Request $request, $commentId)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = Comment::findOrFail($commentId);
        $comment->content = $request->input('content');
        $comment->save();

        Alert::success('Success', 'Updated comment successfully');

        return redirect('/home');
    }

    public function delete($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->delete();

        Alert::success('Success', 'Deleted comment successfully');

        return back();
    }
}
