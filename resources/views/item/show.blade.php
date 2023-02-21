@extends('layouts.logged_in')
@section('content')
    @if ($sold===true)
        <h1>購入した{{$title}}</h1>
    @else
      <h1>{{$title}}</h1>
    @endif   
    @if (isset($item)===true&&($item->situation==='selling'||$sold===true))
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
            @if ($sold===false)
                <br><button><a href="{{route('order.show',$item)}}">購入する</a></button>               
            @endif
        </div>
        @elseif ($item->situation==='sold'&&$sold===false)
            <div>申し訳ありません。ちょっと前に売り切れました。</div>
        @else
            <div>その商品はありません</div>
        @endif
@endsection