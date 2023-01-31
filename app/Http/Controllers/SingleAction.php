<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
class SingleAction extends Controller{
    function __invoke()
    {
        $title = 'シンプルアクションのサンプル';
        $description = 'シンプルアクションコントローラを利用しています。';
        return view('samples.single_action',[
            'title'=>$title,
            'description'=>$description,
        ]);
    }
}