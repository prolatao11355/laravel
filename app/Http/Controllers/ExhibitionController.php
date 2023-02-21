<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExhibitionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $user=\Auth::user();
        $items=$user->items;
        return view('exhibitions.index',[
            'title'=>'出品商品一覧',
            'items'=>$items
        ]);
    }
}
