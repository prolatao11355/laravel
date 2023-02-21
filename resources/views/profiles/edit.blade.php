@extends('layouts.logged_in')
@section('content')
    <h1>{{$title}}</h1>
    <form action="{{route('profile.update')}}" method="post">
        @csrf
        @method('patch')
        <div><label>
            名前: <br>
            <input type="text" name="name" value="{{$user->name}}">    
        </label></div>
        <div><label>
            プロフィール: <br>
            <textarea name="profile" id="" cols="30" rows="10">{{$user->profile}}</textarea>    
        </label></div>
        <input type="submit" value="更新">
    </form>
@endsection