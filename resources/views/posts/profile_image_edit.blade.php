@extends('layouts.logged_in')
@section('content')
    <h1>{{$title}}</h1>
    <h2>現在の画像</h2>
    <div>
        @if (isset($user->image)===true)
            <img src="{{asset('storage/'.$user->image)}}">
        @else    
            <img src="{{asset('images/no_image.png')}}">
        @endif
    </div>
    <form action="{{route('users.update_image')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
            <label>画像を選択: <input type="file" name="image"></label>
        </div>
        <input type="submit" value="更新">
    </form>
@endsection