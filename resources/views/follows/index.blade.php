@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <h1>{{ $title }}</h1>
  <ul>
    @forelse ($follow_users as $follow_user)
      <li class="follow_user">
        @if ($follow_user->image!=='')
          <img src="{{asset('storage/'.$follow_user->image)}}" width="100">
        @else
          <img src="{{asset('images/no_image.png')}}" width="100">    
        @endif
        <br>{{$follow_user->name}}<br>
        <form action="{{route('follows.destroy',$follow_user)}}" method="post" class="follow">
          @csrf
          @method('delete')
          <input type="submit" value="フォロー解除">
        </form>
      </li>   
    @empty
        <li>フォローしているユーザーはいません</li>
    @endforelse
  </ul>
@endsection