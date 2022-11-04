<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function update(Post $comment)
    {
        $data = request()->validate([
            'message' => 'string',
            'post_id' => 'integer',
        ]);
        $comment->update($data);
        return redirect()->route('post.show', $comment->id);
    }
    public function edit(Post $post)
    {
        $comment = Comment::all();
        return view('post.editComment', compact('post', 'comment'));
    }
}
