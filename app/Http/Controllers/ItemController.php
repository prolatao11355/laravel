<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemEditImageRequest;
use App\Http\Requests\ItemEditRequest;
use App\Http\Requests\ItemRequest;
use App\Models\Categories;
use App\Models\Item;
use App\Models\Situation;
use App\Models\User;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $user=\Auth::user();
        $recommend_users=User::recommend($user->id)->get();
        return view('item.top',[
            'title'=>'息をするように、買おう',
            'recommend_users'=>$recommend_users
        ]);
    }
    public function create(){
        $categories=Categories::all();
        return view('item.create',[
            'title'=>'商品を出品',
            'categories'=>$categories
        ]);
    }
    public function store(ItemRequest $request){
        $path='';
        $image=$request->file('image');
        if(isset($image)===true){
            $path=$image->store('photos','public');
        }
        Item::create([
            'user_id'=>\Auth::user()->id,
            'name'=>$request->name,
            'description'=>$request->description,
            'category_id'=>$request->category,
            'price'=>$request->price,
            'image'=>$path,
            'situation'=>'selling',
        ]);
        session()->flash('success','商品を出品しました');
        return redirect()->route('users.exhibitions',\Auth::user()->id);
    }
    public function edit($id){
        $categories=Categories::all();
        $item=Item::find($id);
        return view('item.edit',[
            'title'=>'商品情報の編集',
            'item'=>$item,
            'categories'=>$categories
        ]);
    }
    public function update($id,ItemEditRequest $request){
        $item=Item::find($id);
        $item->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category
        ]);
        session()->flash('success','商品情報を変更しました');
        return redirect()->route('users.exhibitions',\Auth::user()->id);
    }
    public function destroy($id){
        $item=Item::find($id);
        \Storage::disk('public')->delete($item->image);
        $item->delete();
        session()->flash('success','出品商品を削除しました');
        return redirect()->route('users.exhibitions',\Auth::user()->id);
    }
    public function editImage($id){
        $item=Item::find($id);
        return view('item.edit_image',[
            'title'=>'商品画像の変更',
            'item'=>$item
        ]);
    }
    public function updateImage($id,ItemEditImageRequest $request){
        $item=Item::find($id);
        $image=$request->file('image');
        if($item->image!==''){
            \Storage::disk('public')->delete(\Storage::url($item->image));
        }
        $item->update([
            'image'=>$image->store('photos','public')
        ]);
        session()->flash('success','商品画像を変更しました');
        return redirect()->route('users.exhibitions',\Auth::user()->id);
    }
    public function show($id){
        $item=Item::find($id);
        if(\Auth::user()->isOrdered($item)){
            $sold=true;
        }else{
            $sold=false;
        }
        return view('item.show',[
            'title'=>'商品詳細',
            'item'=>$item,
            'sold'=>$sold
        ]);
    }
}
