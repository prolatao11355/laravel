@extends('layouts.logged_in')
@section('content')
    <h1>{{$title}}</h1>
    <br><a href="{{route('items.create')}}">新規出品</a>
    @forelse ($items as $item)
        <div>
            <br><a href="{{route('items.show',$item)}}"><img src="{{asset('storage/'.$item->image)}}" width="300"></a>
            {{$item->description}}
            <br>商品名:{{$item->name}}
            <br>カテゴリ:{{$item->category->name}} ({{$item->created_at}})
            <br>[<a href="{{route('items.edit',$item->id)}}">編集</a>] [<a href="{{route('items.edit_image',$item->id)}}">画像を変更</a>]
            <form action="{{route('items.destroy',$item->id)}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="削除">
            </form>
        </div>
    @empty
        <div>出品している商品はありません</div>
    @endforelse
@endsection