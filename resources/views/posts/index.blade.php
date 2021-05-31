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
                    <!-- $postsを$postずつ表示 -->
                    @foreach ($posts as $post)
                    <div class="card-body">
                        <!-- タイトル{{ $post -> title }}を取得して表示 -->
                        <h5 class="card-title">タイトル:{{ $post -> title }}</h5>
                        <!-- 投稿内容{{ $post -> body }}を取得して表示 -->
                        <p class="card-text">内容：{{ $post -> body }}</p>
                        <img src="{{ asset('storage/image/' .$post->image_path) }}" alt="">
                        <!-- <img src="{{ $post->image_path }}" alt=""> -->
                        <p class="card-text">投稿者：{{ $post -> user ->name }}</p>
                        <a href= "{{ route('posts.show', $post->id)}}" class="btn btn-primary">詳細</a>
                    </div>
                    <div class="card-footer text-muted">
                        投稿日：{{ $post -> created_at }}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
 @endsection