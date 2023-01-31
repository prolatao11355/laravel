<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
class ShowProfile extends Controller{
    function show(){
        $title = 'プロフィール';
        $name = '山田　太郎';
        $address = '東京都港区六本木';
        $like = '寝付けが良い';
        return view('samples.show_profile', [
            'title'=>$title,
            'name'=>$name,
            'address'=>$address,
            'like'=>$like,
        ]);
    }
}