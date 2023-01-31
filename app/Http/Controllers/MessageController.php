<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message;
// use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
class MessageController extends Controller
{
    public function index(){
        $messages = Message::all();
        return view('messages.index',[
            'title'=>'一言掲示板',
            'messages'=>$messages
        ]);
    }
    public function store(MessageRequest $request){
        // $request->validate([
        //     'name'=>['required','min:2','max:20'],
        //     'body'=>['required','min:2','max:100']
        // ]);
        // $message = new Message();
        // $message->name = $request->name;
        // $message->body = $request->body;
        // $message->save();

        // $message = Message::create([
        //     'name' => $request->name,
        //     'body' => $request->body,
        // ]);

        $message = Message::create(
            $request->only([
                'name',
                'body'
            ])
        );
        return redirect('/messages');
    }
}
