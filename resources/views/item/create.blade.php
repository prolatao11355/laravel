@extends('layouts.logged_in')
@section('content')
    <h1>{{$title}}</h1>
    <h2>商品追加フォーム</h2>
    <form action="{{route('items.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div><label>
            商品名:<br>
            <input type="text" name="name">
        </label></div>
        <div><label>
            商品説明: <br>
            <textarea name="description" id="" cols="30" rows="10"></textarea>    
        </label></div>
        <div><label>
            価格:<br>
            <input type="number" name="price">
        </label></div>
        <div><label>
            カテゴリー:<br>
            <select name="category">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>    
        </label></div>
        <div><label>画像を選択: <input type="file" name="image"></label></div>
        <input type="submit" value="出品">
    </form>
@endsection
