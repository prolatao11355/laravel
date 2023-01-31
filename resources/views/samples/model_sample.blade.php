@extends('layouts.default')
@section('title',$title)
@section('content')
    <h1>{{$title}}</h1>
    <p>{{$message->name}}: {{$message->body}} {{$message->created_at}}</p>
@endsection