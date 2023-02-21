@extends('layouts.logged_in')
@section('content')
    <h1>{{$title}}</h1>
    @forelse ($like_items as $item)
        <div>
            <a href="{{route('items.show',$item)}}"><img src="{{asset('storage/'.$item->image)}}" width="300"></a>            {{$item->description}} <br>
            商品名:{{$item->name}} {{$item->price}}円 
            <a class="like_button">{{$item->isLikeBy(Auth::user()) ? '★' : '☆'}}</a>
            <form action="{{route('likes.toggle_like',$item)}}" method="post">
                @csrf
                @method('patch')
                <input type="hidden" value="like" name="like">
            </form>
            <br>カテゴリ:{{$item->category->name}} ({{$item->created_at}})
        </div>
    @empty
        <div>商品はありません</div>
    @endforelse
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
    <script>
        $('.like_button').each(function(){
            $(this).on('click',()=>{
                $(this).next().submit();
            })
        })
    </script>
@endsection