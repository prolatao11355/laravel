@extends('layouts.default')
@section('title',$title)
@section('content')
    <h1>{{$title}}</h1>
    <form method="post">
        @csrf
        <div>
            <label>
              名前:
              <input type="text" name="name">
            </label>
          </div>
          <div>
            <label>
              名前（ふりがな）:
              <input type="text" name="name_kana">
            </label>
          </div>
          <div>
            <label>
              ユーザー名（アルファベットor数字）:
              <input type="text" name="user_name">
            </label>
          </div>
          <div>
            <label>
              メールアドレス:
              <input type="text" name="email">
            </label>
          </div>
          <div>
            <label>
              年齢:
              <input type="text" name="age">
            </label>
          </div>
          <div>
            <label>
              生年月日:
              <input type="date" name="birthdate">
            </label>
          </div>
          <div>
            <label>
              住所:
              <input type="text" name="address">
            </label>
          </div>
          <div>
            <label>
              電話番号:
              <input type="text" name="phone">
            </label>
          </div>
         
          <div>
            <label>
              プライバシーポリシーに同意します:
              <input type="checkbox" name="policy">
            </label>
          </div>
          <div>
            <input type="submit" value="登録">
          </div>
    </form>
@endsection