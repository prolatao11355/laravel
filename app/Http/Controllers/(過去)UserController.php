<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostImageRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id){
        $user = User::find($id);
        return view('posts.show',[
            'title'=>'プロフィール',
            'user'=>$user,
        ]);
    }
    public function edit(){
        $user = \Auth::user();
        return view('posts.profile_edit',[
            'title'=>'プロフィール編集',
            'user'=>$user
        ]);
    }
    public function update(UserRequest $request){
        $user = \Auth::user();
        $user->update($request->only(['name', 'email', 'profile']));
        session()->flash('success', '編集をしました');
        return redirect()->route('users.show',$user->id);
    }
    public function editImage(){
        $user = \Auth::user();
        return view('posts.profile_image_edit', [
            'title'=>'画像変更画面',
            'user'=>$user
        ]);
    }
    public function updateImage(PostImageRequest $request,FileUploadService $service){
        $path = $service->saveImage($request->file('image'));
        $user = \Auth::user();
        if($user->image!==''){
            \Storage::disk('public')->delete(\Storage::url($user->image));
        }
        $user->update([
            'image'=>$path
        ]);
        session()->flash('success','画像を変更しました');
        return  redirect()->route('users.show',$user->id);
    }
}
