@extends('layouts.default')
@section('title',$title)
@section('content')
    <h1>{{$title}}</h1>
    <p>id: {{$id}}</p>
    <p>comment_id: {{$comment_id}}</p>
@endsection