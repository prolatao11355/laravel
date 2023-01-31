<?php
 

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
 
class SampleController extends Controller
{
    public function sampleAction(){
        $title = 'コントローラーのアクションを利用';
        $num = 10;
        $names = ['山田', '山本', '鈴木', '佐藤', '田中'];
        return view('samples.blade_example',[
            'title' => $title,
            'num' => $num,
            'names' => $names,
        ]);
    }
    public function routeParameter($id,$comment_id){
        return view('samples.route_parameter',[
            'title'=>'ルートパラメータのサンプル',
            'id'=>$id,
            'comment_id'=>$comment_id
        ]);
    }
    public function requestForm(){
        return view('samples.request_form', [
            'title'=>'フォームサンプル',
        ]);
    }
    public function requestSample(Request $request){
        $user_name = $request->input('user_name');
        $comment = $request->input('comment');
        return view('samples.request_sample',[
            'title'=>'リクエストの受け取り',
            'user_name'=>$user_name,
            'comment'=>$comment
        ]);
    }
    public function showItem($id){
        $items = [
            [
                'name' => 'みかん',
                'price' => 200,
            ],
            [
                'name' => 'バナナ',
                'price' => 100,
            ],
            [
                'name' => 'キウイ',
                'price' => 150,
            ],
            [
                'name' => 'イチゴ',
                'price' => 500,
            ],
        ];
        return view('samples.show_item',[
            'title'=>'課題：ルーティングパラメータ',
            'id'=>$id,
            'items'=>$items
        ]);
    }

    public function formPractice(){
        return view('samples.form_practice',[
            'title'=>'課題：フォーム送信',
        ]);
    }
    public function requestPractice(Request $request){
        $name = $request->input('name');
        $address = $request->input('address');
        $phone = $request->input('phone');
        return view('samples.request_practice',[
            'title'=>'課題：フォーム送信',
            'name'=>$name,
            'address'=>$address,
            'phone'=>$phone
        ]);
    }

    public function modelSample(){
        $message = Message::find(1);
        return view('samples.model_sample',[
            'title'=>'モデルの使い方',
            'message'=>$message
        ]);
    }
}