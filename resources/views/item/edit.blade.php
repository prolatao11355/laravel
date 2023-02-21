@extends('layouts.logged_in')
@section('content')
    <h1>{{$title}}</h1>
    <h2>商品追加フォーム</h2>
    <form action="{{route('items.update',$item->id)}}" method="post">
        @csrf
        @method('patch')
        <div><label>
            商品名: <br>
            <input type="text" name="name" value="{{$item->name}}">    
        </label></div>
        <div><label>
            商品説明: <br>
            <textarea name="description" cols="30" rows="10">{{$item->description}}</textarea>
        </label></div>
        <div><label>
            価格: <br>
            <input type="number" name="price" value="{{$item->price}}">    
        </label></div>
        <div><label>
            カテゴリー: <br>
            <select name="category">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach 
            </select>    
        </label></div>
        <input type="submit" value="出品">
    </form>
@endsection