{{-- レイアウトファイルを指定 --}}
@extends('layouts.default')
{{-- @yield('title') の部分を穴埋め --}}
@section('title',$title)
{{-- @yield('content') の部分を穴埋め --}}
@section('content')
    <h1>{{$title}}</h1>

    <p>$numの値は{{$num}}です。</p>
    @if ($num>5)
        <p>5より大きいです。</p>
    @endif

    @if($num > 15)
        <p>15より大きいです。</p>
    @elseif($num > 5)
        <p>5より大きく15以下です。</p>
    @else
        <p>15以下です。</p>
    @endif

    <ul>
        @foreach ($names as $name)
            <li>{{$name}}</li>
        @endforeach
    </ul>
@endsection


