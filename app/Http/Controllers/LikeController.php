<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Likes;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $like_items=\Auth::user()->likeItems;
        return view('likes.index',[
            'title'=>'お気に入り一覧',
            'like_items'=>$like_items
        ]);
    }
    public function toggleLike($id,Request $request){
        $user=\Auth::user();
        $item=Item::find($id);
        if($item->isLikeBy($user)){
            $item->likes()->where('user_id',$user->id)->first()->delete();
            session()->flash('success','いいねを削除しました');
        }else{
            Likes::create([
                'user_id'=>$user->id,
                'item_id'=>$item->id
            ]);
            session()->flash('success','いいねを追加しました');
        }
        $url='top';
        if(isset($request->like)===true){
            $url='likes.index';
        }
        return redirect()->route($url);
    }
}
