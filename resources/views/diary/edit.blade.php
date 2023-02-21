@extends('layouts.logged_in')
@section('title',$title)
@section('content')
    <main>
        <div class="content">
            <h1>{{$title}}</h1> <br>
            <a href="{{url('/diaries')}}">一覧に戻る</a>
            <form action="{{url('/diaries/'.$diary->id)}}" method="post">
                @method('patch')
                @csrf
                <div><label>タイトル: <input type="text" name="title" value={{$diary->title}}></label></div>
                <div><textarea name="body" cols="30" rows="10" >{{$diary->body}}</textarea></div>
                <input type="submit" value="保存">
            </form>  
        </div>
    </main>
      
@endsection