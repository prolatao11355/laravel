<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $follow_users = \Auth::user()->follow_users;
        return view('follows.index', [
            'title'=>'フォロー一覧',
            'follow_users'=>$follow_users
        ]);
    }

    public function store(Request $request){
        $user = \Auth::user();
        Follow::create([
            'user_id'=>$user->id,
            'follow_id'=>$request->follow_id,
        ]);
        \Session::flash('success', 'フォローしました');
        return redirect()->route('posts.index');
    }

    public function destroy($id){
        $follow = \Auth::user()->follows->where('follow_id', $id)->first();
        $follow->delete();
        \Session::flash('success', 'フォロー解除しました');
        return redirect()->route('posts.index');
    }

    public function followedIndex(){
        $followers = \Auth::user()->followers;
        return view('follows.follower_index', [
            'title' => 'フォロワー一覧',
            'followers'=>$followers
        ]);
    }
    public function followMutual(){
        $follow_users = \Auth::user()->follow_users;
        $follower_users = \Auth::user()->followers;
        return view('follows.follow_mutual', [
            'title'=>'相互フォロー一覧',
            'follow_users'=>$follow_users,
            'follower_users'=>$follower_users
        ]);
    }
}
