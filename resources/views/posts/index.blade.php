@extends('layouts.logged_in')
 
@section('content')
  <h1>{{ $title }}</h1>
  <h2>おすすめユーザー</h2>
  <div>
    @forelse ($recommend_users as $recommend_user)
      <div><a href="{{route('users.show',$recommend_user)}}">{{$recommend_user->name}}</a> </div>  
      @if (Auth::user()->isFollowing($recommend_user))
          <form class="follow" action="{{route('follows.destroy',$recommend_user)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="フォロー解除">
          </form>
      @else
          <form action="{{route('follows.store')}}" class="follow" method="post">
            @csrf
            <input type="hidden" name="follow_id" value="{{$recommend_user->id}}">
            <input type="submit" value="フォロー">
          </form>
      @endif
    @empty
        おすすめユーザーいません
    @endforelse
  </div>
  <div>
    @forelse($recommend_users as $recommend_user)
      <h2>{{$recommend_user->name}}のおすすめ投稿</h2>
      <ul class="posts">
        @forelse($recommend_user->user_posts->shuffle()->take(3) as $post)
            <li class="post">
              <div class="post_content">
                <div class="post_body">
                  <div class="post_body_heading">
                    投稿者:{{ $post->user->name }}
                    ({{ $post->created_at }})
                  </div>
                  <div class="post_body_main">
                    <div class="post_body_main_img">
                      @if($post->image !== '')
                          <img src="{{ asset('storage/' . $post->image) }}">
                      @else
                          <img src="{{ asset('images/no_image.png') }}">
                      @endif
                      [<a href="{{route('posts.edit_image',$post)}}">画像編集</a>]
                    </div>
                    <div class="post_body_main_comment">
                      {{ $post->comment }}
                    </div>
                  </div>
                  <div class="post_body_footer">
                    <a class="like_button">{{$post->isLikedBy(Auth::user()) ? '★' : '☆' }}</a>
                  <form action="{{route('posts.toggle_like',$post)}}" method="post" class="like">
                    @csrf
                    @method('patch')
                  </form>
                    [<a href="{{ route('posts.edit', $post) }}">編集</a>]
                    <form class="delete" method="post" action="{{ route('posts.destroy', $post) }}">
                      @csrf
                      @method('DELETE')
                      <input type="submit" value="削除">
                    </form>
                  </div>
                </div>
                <div class="post_comments">
                  <span class="post_comments_header">コメント</span>
                  <ul class="post_comments_body">
                    @forelse($post->comments as $comment)
                      <li>{{ $comment->user->name }}: {{ $comment->body }}</li>
                    @empty
                      <li>コメントはありません。</li>
                    @endforelse
                  </ul>
                  <form method="post" action="{{ route('comments.store') }}">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <label>
                      <input type="text" name="body">
                    </label>
                    <input type="submit" value="送信">
                  </form>
                </div>
              </div>
            </li>
        @empty
            <li>書き込みはありません。</li>
        @endforelse
    </ul>


      @empty
      <li>おすすめユーザーはいません</li>
      @endforelse

  </div>
  <a href="{{route('posts.create')}}">新規投稿</a>
  <ul class="posts">
      @forelse($posts as $post)
          <li class="post">
            <div class="post_content">
              <div class="post_body">
                <div class="post_body_heading">
                  投稿者:{{ $post->user->name }}
                  ({{ $post->created_at }})
                </div>
                <div class="post_body_main">
                  <div class="post_body_main_img">
                    @if($post->image !== '')
                        <img src="{{ asset('storage/' . $post->image) }}">
                    @else
                        <img src="{{ asset('images/no_image.png') }}">
                    @endif
                    [<a href="{{route('posts.edit_image',$post)}}">画像編集</a>]
                  </div>
                  <div class="post_body_main_comment">
                    {{ $post->comment }}
                  </div>
                </div>
                <div class="post_body_footer">
                  <a class="like_button">{{$post->isLikedBy(Auth::user()) ? '★' : '☆' }}</a>
                  <form action="{{route('posts.toggle_like',$post)}}" method="post" class="like">
                    @csrf
                    @method('patch')
                  </form>
                  [<a href="{{ route('posts.edit', $post) }}">編集</a>]
                  <form class="delete" method="post" action="{{ route('posts.destroy', $post) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="削除">
                  </form>
                </div>
              </div>
              <div class="post_comments">
                <span class="post_comments_header">コメント</span>
                <ul class="post_comments_body">
                  @forelse($post->comments as $comment)
                    <li>{{ $comment->user->name }}: {{ $comment->body }}</li>
                  @empty
                    <li>コメントはありません。</li>
                  @endforelse
                </ul>
                <form method="post" action="{{ route('comments.store') }}">
                  @csrf
                  <input type="hidden" name="post_id" value="{{ $post->id }}">
                  <label>
                    <input type="text" name="body">
                  </label>
                  <input type="submit" value="送信">
                </form>
              </div>
            </div>
          </li>
      @empty
          <li>書き込みはありません。</li>
      @endforelse
  </ul>
  {{$posts->withQueryString()->links()}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
  <script>
    $('.like_button').each(function(){
      $(this).on('click',function(){
        $(this).next().submit();
      });
    });
  </script>
@endsection