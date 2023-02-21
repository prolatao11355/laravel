@extends('layouts.logged_in')
@section('title',$title)
@section('content')
    <div>
        <main>
            <h1>{{$title}}</h1>
            <div class="content-box">
                <div class="title"><a href="{{url('/diaries/create')}}">新規投稿</a></div>
                <div class="box">
                    @forelse ($diaries as $diary)
                        <div class="content">
                            {{$diary->user->name}}: {{$diary->title}} {{$diary->created_at}} <br>
                            {{$diary->body}} <br>
                            <a href="{{url('/diaries/'.$diary->id.'/edit')}}">編集</a>
                            <form method="post" action="{{url('/diaries/'.$diary->id)}}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="削除">
                            </form>
                        </div>    
                    @empty
                        <p>日記ありません</p>
                    @endforelse
                </div>
            </div>
        </main>
    </div>
    
@endsection