@extends('layouts.app')

@section('content')
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
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            <!-- ↓悪意のあるユーザーから保護 -->
            {{csrf_field()}}
            {{method_field('PATCH')}}
                <div class="form-group">
                    <label>タイトル</label>
                    <input type="text" class="form-control" placeholder="タイトルを入力して下さい" name="title" value="{{ $post->title}}">
                </div>
                <div class="form-group">

                    <label>内容</label>
                    <textarea class="form-control" placeholder="内容を入力して下さい" rows="5" name="body">{{ $post->body }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">画像</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">更新する</button>
            </form>
        </div>
    </div>
</div>
@endsection