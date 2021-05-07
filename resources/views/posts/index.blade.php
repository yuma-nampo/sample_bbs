<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAMPLE_BBS</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>
<body>
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
                        <!-- {{ $post -> title }}を取得して表示 -->
                        <h5 class="card-title">名前:{{ $post -> title }}</h5>
                        <p class="card-text">内容：{{ $post -> body }}</p>
                        <img src="{{ $post->image_path }}" alt="">
                    </div>
                    <div class="card-footer text-muted">
                        投稿日：{{ $post -> created_at }}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>