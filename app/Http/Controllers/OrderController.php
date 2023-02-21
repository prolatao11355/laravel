<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show($id){
        $item=Item::find($id);
        return view('order.show',[
            'item'=>$item
        ]);
    }
    public function showConfirmation($id){
        $item=Item::find($id);
        if($item->situation==='selling'&&isset($item)===true){
            $item->update([
                'situation'=>'sold'
            ]);
            Orders::create([
                'user_id'=>\Auth::user()->id,
                'item_id'=>$id,
            ]);
        }
        return redirect()->route('order.completion',$id);
    }
    public function completion($id){
        $item=Item::find($id);
        return view('order.completion',[
            'title'=>'ご購入ありがとうございました。',
            'item'=>$item
        ]);
    }
}

