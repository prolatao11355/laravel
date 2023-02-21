<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PracticeProfileRequest;
use App\Http\Requests\ProfileImageRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //プロフィール画面
    public function show($id){
        $user=User::find($id);
        $order_items=$user->orderItems;
        return view('profiles.show',[
            'title'=>'プロフィール',
            'user'=>$user,
            'items'=>$user->items,
            'order_items'=>$order_items
        ]);
    }

    //プロフィール編集
    public function edit(){
        $user=\Auth::user();
        return view('profiles.edit',[
            'title'=>'プロフィール編集',
            'user'=>$user
        ]);
    }
    public function update(PracticeProfileRequest $request){
        $user=\Auth::user();

        $user->update(['name'=>$request->name,'profile'=>$request->profile]);
        return redirect()->route('profile.show',$user->id);
    }

    //画像編集
    public function editImage(){
        $user=\Auth::user();
        return view('profiles.edit_image',[
            'title'=>'プロフィール画像編集',
            'user'=>$user
        ]);
    }
    public function updateImage(ProfileImageRequest $request){
        $path='';
        $image=$request->file('image');
        if(isset($image)===true){
            $path=$image->store('photos','public');
        }    
        $user=\Auth::user();
        if($user->image!==''){
            \Storage::disk('public')->delete(\Storage::url($user->image));
        }
        $user->update([
            'image'=>$path
        ]);
        session()->flash('success','プロフィール画像を更新しました');
        return redirect()->route('profile.show',$user->id);
    }
}
