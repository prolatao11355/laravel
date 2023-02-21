@extends('layouts.logged_in')
@section('content')
    <h1>{{$title}}</h1>
    <br>
    <h2>現在の画像</h2>
    <br>
    @if ($user->image!=='')
        <img src="{{asset('storage/'.$user->image)}}">
    @else
        <img src="{{asset('images/no_image.png')}}">
    @endif
    <form action="{{route('profile.update_image')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <label>画像を選択:<input type="file" name="image"></label>
        <br>
        <input type="submit" value="更新">
    </form>
@endsection