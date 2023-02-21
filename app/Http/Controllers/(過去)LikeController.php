<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $like_posts = \Auth::user()->likePosts()->paginate(3);
        return view('likes.index', [
            'title'=>'いいね一覧',
            'like_posts'=>$like_posts
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
