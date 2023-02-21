@extends('layouts.practice')
{{-- @extends('layouts.default') --}}
@section('header')
<header>
    <ul class="header_nav">
        <li><a href="{{route('top')}}">Market</a></li>
        @if(Auth::check())
            <li>こんにちは、{{Auth::user()->name}}さん！</li>
        @endif
        <li><a href="{{route('profile.show',\Auth::user()->id)}}">プロフィール</a></li>
        <li><a href="{{route('likes.index')}}">お気に入り一覧</a></li>
        <li><a href="{{route('users.exhibitions',\Auth::user()->id)}}">出品商品一覧</a></li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <input type="submit" value="ログアウト">
            </form>
        </li>
    </ul>
    
</header>
@endsection