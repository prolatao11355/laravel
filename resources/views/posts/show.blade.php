@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <h1>{{ $title }}</h1>
  <div>[ <a href="{{route('users.edit')}}">編集</a> ]</div>
  <div>
    名前: {{$user->name}}
  </div>
  <div>
    <strong>プロフィール画像</strong> <br>
    @if($user->image !== '')
        <img src="{{ asset('storage/' . $user->image) }}">
    @else
        フリー素材等を利用して適宜準備しましょう。
    @endif
    <a href="{{route('users.edit_image')}}">画像を変更</a>
  </div>
  <div>
    <strong>プロフィール</strong> <br>
    @if($user->profile !== '')
        {{$user->profile}}
    @else
        プロフィールが設定されていません。
    @endif
  </div>
@endsection