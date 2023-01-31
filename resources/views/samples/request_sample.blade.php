@extends('layouts.default')
@section('title',$title)
@section('content')
<h1>{{$title}}</h1>
<p>名前:{{$user_name}}</p>
<p>コメント:{{$comment}}</p>
@endsection