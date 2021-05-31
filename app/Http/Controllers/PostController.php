<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\User;
use App\Comment;
use Auth;
// use JD\Cloudder\Facades\Cloudder;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id', 'desc')->get(); //最新順で投稿を取得

        return view('posts.index', compact('posts')); //view/posts/indexを表示させる
    }

    public function create(){
        return view('posts.create');//view/posts/createを表示させる
    }

    public function show($id){
        $post = Post::find($id);

        $comments = Comment::where('post_id',$id)->get();

        return view('posts.show', compact('post','comments'));//view/posts/showを表示させる
    }

    public function edit($id){
        $post = Post::find($id);

        if(Auth::id() != $post -> user_id){//URLからのアクセス制限
            return abort(404);
        }
        
        return view('posts.edit', compact('post'));//view/posts/editを表示させる
    }

    public function update(PostRequest $request, $id){
        $post = Post::find($id);

        $post -> title    = $request -> title;
        $post -> body     = $request -> body;
        $post -> save();
        return redirect()->route('posts.index');
    }
    public function destroy($id){
        $post = Post::find($id);
        
        $post -> delete();

        return redirect()->route('posts.index');
    }
    
    public function store(PostRequest $request){
        // dd($request);
        // dd($request->file('image'));
        $post = new Post; //インスタンスを作成(新しい投稿を作成して$postへ代入)

        $post -> title   = $request -> title;//$requestの中のtitleを代入
        $post -> body    = $request -> body; //$requestの中のbodyを代入
        $post -> user_id = Auth::id();//Authの中のid
        
        if ($image = $request -> file('image')) {//画像があった場合
        $filename = $request  -> file('image') -> store('public/image');//public/imageへ画像保存。コマンドでリンク済み
        $post -> image_path = basename($filename);//URLのみを取得してデータベースへ保存する
        }
        // if ($image = $request->file('image')) {
        //     $image_path = $image->getRealPath();//アップロードされたファイルの絶対パスを取得
        //     Cloudder::upload($image_path, null);//Cloudinaryへアップロード
        //     $publicId = Cloudder::getPublicId();//直前にアップロードされた画像のpublicIdを取得する。
        //     $logoUrl = Cloudder::secureShow($publicId, [//publicIdを取得した画像のURLを生成
        //         'width'   => 200,//保存される画像の高さ幅を指定
        //         'height'  => 200
        //     ]);
        //     $post->image_path = $logoUrl;//postテーブルのimage_pathカラムに画像のURLを代入
        //     $post->public_id  = $publicId;//postテーブルのpublic_idカラムに画像の名前を代入
        // }
        $post -> save(); //インスタンスを保存

        return redirect() -> route('posts.index');//投稿後posts.indexへ飛ばす
    }

}
