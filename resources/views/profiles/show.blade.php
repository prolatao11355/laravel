<?php
$count=0;
foreach ($items as $item) {
    $count++;
}
?>
@extends('layouts.logged_in')
@section('content')
    <h1>{{$title}}</h1>
    @if ($user->image!=='')
        <img src="{{asset('storage/'.$user->image)}}">
    @else
        <img src="{{asset('images/no_image.png')}}">
    @endif
    <a href="{{route('profile.edit_image')}}">画像を変更</a>
    <br>{{$user->name}}さん 
    <br>{{$user->profile}}
    <a href="{{route('profile.edit')}}">プロフィール編集</a>
    <p>出品数: <?php echo $count ?></p>
    <br><h1>購入履歴</h1>
@foreach ($order_items as $item)
    <div>
        <a href="{{route('items.show',$item)}}">{{$item->name}}</a>: {{$item->price}} 出品者 {{$item->user->name}}さん
    </div>
@endforeach
@endsection