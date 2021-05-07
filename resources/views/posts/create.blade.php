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
            <!-- バリテーション エラーがあったら表示 -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            <!-- ↓悪意のあるユーザーから保護 -->
            {{csrf_field()}}
                <div class="form-group">
                    <label>名前</label>
                    <input type="text" class="form-control" placeholder="名前を入力して下さい" name="title">
                </div>
                <div class="form-group">
                    <label>内容</label>
                    <textarea class="form-control" placeholder="内容" rows="5" name="body"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">画像</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">作成する</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>