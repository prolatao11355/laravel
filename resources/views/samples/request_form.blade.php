@extends('layouts.default')
@section('title',$title)
@section('content')
<h1>{{$title}}</h1>
<form action="{{url('/request_sample')}}" method="post">
    @csrf
    <div>
        <label> 名前: <input type="text" name="user_name"></label>
    </div>
    <div>
        <label>コメント: <input type="text" name="comment"></label>
    </div>
    <input type="submit" value="送信">
</form>
@endsection