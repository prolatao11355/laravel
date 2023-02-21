@extends('layouts.default')
@section('title',$title)
@section('content')
    <h1>{{$title}}</h1>
    @if ($count===1)
        <p>初めての訪問</p>
    @else
        <p>{{$count}}回目の訪問</p>
    @endif
    <form method="post">
        @csrf
        <input type="submit" value="履歴を削除">
    </form>
@endsection