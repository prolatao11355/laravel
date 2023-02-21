<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostImageRequest;
use App\Http\Requests\PostRequest;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //投稿一覧
    public function index()
    {
        // $posts = Post::where('user_id', \Auth::user()->id)->get();
        //ModelsでUserを修正する必要がある
        //posts->posts()にすることでクエリビルダを取得できる
        //latestを利用して新着順に並べ替え、getで取得


        // $posts = \Auth::user()->posts()->latest()->get();
        // return view('posts.index',[
        //     'title'=>'投稿一覧',
        //     'posts'=>$posts,
        // ]);

        $user = \Auth::user();
        $recommend_users=User::recommend($user->id)->get();
        $follow_user_ids = $user->follow_users->pluck('id');
        $user_posts = $user->posts()->orWhereIn('user_id', $follow_user_ids)->latest()->paginate(5);
        return view('posts.index', [
            'title'=>'投稿一覧',
            'posts'=>$user_posts,
            'recommend_users'=>$recommend_users,
        ]);
    }

    //新規投稿フォーム
    public function create()
    {
        return view('posts.create', [
            'title'=>'新規投稿'
        ]);
    }

    //投稿追加処理
    public function store(PostRequest $request)
    {
        //画像投稿処理
        $path = '';
        $image = $request->file('image');
        if(isset($image)===true){
            // publicディスク(storage/app/public/)のphotosディレクトリに保存
            $path = $image->store('photos', 'public');
        }

        Post::create([
            'user_id'=>\Auth::user()->id,
            'comment'=>$request->comment,
            'image'=>$path,
        ]);
        session('success', '投稿を追加しました');
        return redirect()->route('posts.index');
    }

    //投稿詳細
    public function show($id)
    {
        return view('posts.show', [
            'title' => '投稿編集'
        ]);
    }

    //投稿編集フォーム
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', [
            'title'=>'投稿編集',
            'post'=>$post,
        ]);
    }

    //投稿更新処理
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->only(['comment']));
        session()->flash('success', '投稿を編集しました');
        return redirect()->route('posts.index');
    }

    //投稿削除処理
    public function destroy($id)
    {
        $post = Post::find($id);
        //画像の削除
        if($post->image!==''){
            \Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        session()->flash('succes', '投稿を削除しました');
        return redirect()->route('posts.index');
    }

    //画像変更処理
    public function editImage($id){
        $post = Post::find($id);
        return view('posts.edit_image',[
            'title'=>'画像変更画面',
            'post'=>$post
        ]);
    }
    public function updateImage($id,PostImageRequest $request){
        $path = '';
        $image = $request->file('image');
        if (isset($image)===true){
            $path = $image->store('photos', 'public');
        }
        $post = Post::find($id);
        if($post->image!==''){
            \Storage::disk('public')->delete(\Storage::url($post->image));
        }
        $post->update([
            'image'=>$path,
        ]);
        session()->flash('success', '画像を変更しました');
        return redirect()->route('posts.index');
    }
    public function toggleLike($id){
        $user = \Auth::user();
        $post = Post::find($id);
        if($post->isLikedBy($user)){
            $post->likes()->where('user_id', $user->id)->first()->delete();
            \Session::flash('success', 'いいねを取り消しました');
        }else{
            Like::create([
                'user_id'=>$user->id,
                'post_id'=>$post->id
            ]);
            \Session::flash('success', 'いいねしました');
        }
        return redirect()->route('posts.index');
    }
}
