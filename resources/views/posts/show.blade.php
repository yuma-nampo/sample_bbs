@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>SAMPLE_BBS</h1>
                <!-- {{ route('posts.create') }}でPostsController@createへ飛んでいる -->
                <a href="{{ route('posts.create') }}" class="btn btn-primary">新規投稿</a>
                <div class="card text-center">
                    <div class="card-header">
                        SAMPLE_BBS
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">タイトル:{{ $post -> title }}</h5><!-- タイトル{{ $post -> title }}を取得して表示 -->
                        <p class="card-text">内容：{{ $post -> body }}</p><!-- 投稿内容{{ $post -> body }}を取得して表示 -->
                        <img src="{{ asset('storage/image/' .$post->image_path) }}" alt="">
                        <!-- <img src="{{ $post->image_path }}" alt=""> -->
                        @if (Auth::id() == $post -> user_id)<!-- 投稿したユーザーとログインユーザーが同じ場合 -->
                        <a href= "{{ route('posts.edit', $post->id)}}" class="btn btn-primary">編集する</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method='post'>
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type='submit' value='削除' class="btn btn-danger" onclick='return confirm("削除しますか？");'>
                        </form>
                        @endif
                    </div>
                    <div class="card-footer text-muted">
                        投稿日：{{ $post -> created_at }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('comments.store') }}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="form-group">
                        <label>コメント</label>
                        <textarea class="form-control" 
                        placeholder="内容" rows="5" name="body"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">コメントする</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($post->comments as $comment)
                <div class="card mt-3">
                    <h5 class="card-header">投稿者：{{ $comment->user->name }}</h5>
                    <div class="card-body">
                        <h5 class="card-title">投稿日時：{{ $comment->created_at }}</h5>
                        <p class="card-text">内容：{{ $comment->body }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection