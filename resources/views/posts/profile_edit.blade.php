@extends('layouts.logged_in')
@section('content')
    <h1>{{$title}}</h1>
    <div>[ <a href="{{route('users.show',$user->id)}}">戻る</a> ]</div>
    <form action="{{route('users.update')}}" method="post">
        @csrf
        @method('patch')
        <div><label>名前: <input type="text" value="{{$user->name}}" name="name"></label></div>
        <div><label>メールアドレス: <input type="email" value="{{$user->email}}" name="email"></label></div>
        <div><label>プロフィール: <br> <textarea name="profile" id="" cols="30" rows="10">{{$user->profile}}</textarea></label></div>
        <input type="submit" value="更新">
    </form>
@endsection