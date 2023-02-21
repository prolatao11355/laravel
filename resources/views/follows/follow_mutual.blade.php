@extends('layouts.logged_in')
@section('content')
    <h1>{{$title}}</h1>
    <div>
        <h2>フォロー一覧</h2><br>
        <ul class="follow">
            @forelse ($follow_users as $follow)
                <li>
                    @if ($follow->image!=='')
                        <img src="{{asset('storage/'.$follow->image)}}" width="100">
                    @else
                        <img src="{{asset('images/no_image.png')}}">
                    @endif
                    <br>{{$follow->name}} <br>
                    <form action="{{route('follows.destroy',$follow)}}" method="post" class="follow">
                        @csrf
                        @method('delete')
                        <input type="submit" value="フォロー解除">
                    </form>
                </li>
            @empty
                <li>フォローしているユーザーはいません</li>
            @endforelse
        </ul>
    </div>
    <div>
        <h2>フォロワー一覧</h2><br>
        <ul class="follower">
            @forelse ($follower_users as $follower)
                <li>
                    @if ($follower->image!=='')
                        <img src="{{asset('storage/'.$follower->image)}}" width="100">
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
                        <form action="{{route('follows.store')}}" method="post" class="follow">
                            @csrf
                            <input type="hidden" name="follow_id" value="{{$follower->id}}">
                            <input type="submit" value="フォロー">
                        </form>
                    @endif
                </li>
            @empty
                <li>フォローしているユーザーはいません</li>
            @endforelse
        </ul>
    </div>
@endsection