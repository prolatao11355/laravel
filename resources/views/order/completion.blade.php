@extends('layouts.logged_in')
@section('content')
    <h1>{{$title}}</h1>
    @if (isset($item)===true)
        <div>
            <strong>商品名</strong>
            <br>{{$item->name}}
            <br><strong>画像</strong>
            <br><img src="{{asset('storage/'.$item->image)}}" width="300">
            <br><strong>カテゴリ</strong>
            <br>{{$item->category->name}}
            <br><strong>価格</strong>
            <br>{{$item->price}}
            <br><strong>説明</strong>
            <br>{{$item->description}}
            <br><a href="{{route('top')}}">トップに戻る</a>
        </div>
    @else
        <div>その商品はありません</div>
    @endif

@endsection