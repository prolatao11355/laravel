@extends('layouts.practice7_layout')
@section('title',$title)
@section('content')
<form action="{{url('/request_practice')}}" method="post">
    @csrf
    <div><label>ユーザー名: <input type="text" name="name"></label></div>
    <div><label>住所: <input type="text" name="address"></label></div>
    <div><label>電話番号: <input type="text" name="phone"></label></div>
    <input type="submit" value="送信">
</form>
@endsection