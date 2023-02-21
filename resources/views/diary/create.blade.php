@extends('layouts.logged_in')
@section('title',$title)
@section('content')
    <h1>{{$title}}</h1>
    <p><a href="{{url('/diaries')}}">一覧に戻る</a></p>
    <form action="{{url('/diaries')}}" method="post">
        @csrf
        <div><label>タイトル: <input type="text" name="title"></label></div>
        <div><textarea cols="50" rows="10" name="body"></textarea></div>
        <input type="submit" value="保存">
    </form>
@endsection