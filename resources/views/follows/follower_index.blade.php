@extends('layouts.logged_in')
 
@section('title', $title)
 
@section('content')
  <h1>{{ $title }}</h1>
  <ul class="follower">
    @forelse ($followers as $follower)
      <li class="follower">
        @if ($follower->image!=='')
          <img src="{{asset('storage/',$follower->image)}}">
        @else
          <img src="{{asset('images/no_image.png')}}">
        @endif
        <br>{{$follower->name}} <br>
        @if (Auth::user()->isFollowing($follower))
          <form action="{{route('follows.destroy',$follower)}}" method="post" class="follow">
            @csrf
            @method('delete')
            <input type="submit" value="フォロー解除">
          </form>
        @else
          <form action="{{route('follows.store')}}" class="follow" method="post">
            @csrf
            <input type="hidden" name="follow_id" value="{{$follower->id}}">
            <input type="submit" value="フォロー">
          </form>
        @endif
      </li>    
    @empty
      <li>フォローされているユーザーはいません</li>
    @endforelse
  </ul>
@endsection