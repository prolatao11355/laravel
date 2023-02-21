@extends('layouts.logged_in')
@section('content')
    @if (isset($item)===true&&$item->situation==='selling')
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
            <form action="{{route('order.show_confirmation',$item)}}" method="post">
                @csrf
                @method('patch')
                <input type="submit" value="内容を確認し、購入する">
            </form>
        </div>
    @elseif ($item->situation==='sold')
        <div>申し訳ありません。ちょっと前に売り切れました。</div>
    @else
        <div>その商品はありません</div>
    @endif

@endsection