@extends('messages_sample.layouts')
@section('title',$title)
@section('content')
    <label>名前: <input type="text"></label>
    <br>
    <label>コメント: <input type="text"></label>
    <br>
    <input type="submit" value="投稿">
@endsection