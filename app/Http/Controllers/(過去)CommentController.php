<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request){
        Comment::create([
            'post_id'=>$request->post_id,
            'user_id'=>\Auth::user()->id,
            'body'=>$request->body,
        ]);
        session()->flash('success', 'コメントを投稿しました');
        return redirect('/posts');
    }
}
