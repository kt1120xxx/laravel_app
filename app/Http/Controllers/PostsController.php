<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    protected $guarded = ['id','title','body'];

    /*
    |--------------------------------------------------------------------------
    | laravel掲示板
    |--------------------------------------------------------------------------
    |
    */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(5);
        return view('posts.index',['posts' => $posts]);
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'title'=>'required|max:50',
            'body'=>'required|max:2000',
        ]);

        Post::create($params);
        return redirect()->route('top');
    }
    
    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('posts.show',[
        	'post'=>$post,
        ]);
    }

    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

   public function update($post_id, Request $request)
   {
        $params = $request->validate([
            'title'=>'required|max:50',
            'body'=>'required|max:2000',
        ]);

        $post = Post::findOrFail($post_id);
        $post->fill($params)->save();

        return redirect()->route('posts.show',['post'=>$post]);
   }

   public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);
        $post->delete();
        return redirect()->route('top');
    }

    
    /*
    |--------------------------------------------------------------------------
    | vue掲示板
    |--------------------------------------------------------------------------
    |
    */

    // indexデータ取得
    public function vueTop()
    {    
        $posts = Post::orderBy('created_at','desc')->get();
        return view('vue_top',compact('posts'));
    }

    // vueからaxiosで検索データを受け取り、結果をjsonで返却
    public function topicSearch($searchTitle)
    {
        $searchTitle = Post::where('title', '=', $searchTitle)->orderBy('created_at','desc')->get();
        return $searchTitle;
    }

    // vueからaxiosでjsonデータを取得
    public function apiTest()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return $posts;
    }

    // vueからpostされたデータを新規作成
    public function topics(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect()->route('top');
    }

    // vueからpostされたデータを編集
    public function topicsUpdate($updateId, $updateTitle, $updateBody)
    {
        $post = Post::find($updateId);
        $post->title = $updateTitle;
        $post->body = $updateBody;
        $post->save();
    }

    // vueからpostされたデータを削除
    public function topicsDelete($deleteID)
    {
        Post::destroy($deleteID);
    }


    /*
    |--------------------------------------------------------------------------
    | 練習用
    |--------------------------------------------------------------------------
    |
    */
    // vueでのページネーションをうまくできず
    public function pagination()
    {
        $posts = Post::paginate(5);
        return $posts;
    }

    // props、emitを検索処理処理で練習
    public function sample()
    {
        return view('sample');
    }
}