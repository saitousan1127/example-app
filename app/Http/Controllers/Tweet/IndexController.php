<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // メソッドの引数に指定するだけで、サービスコンテナより自動的にインスタンス化してくれる
    public function __invoke(Request $request, TweetService $tweetService)
    {
        $tweets = $tweetService->getTweets();  // クラスのメソッドを使って全データを取得
        /*
        // デバック用
        dump($tweets);
        app(\App\Exceptions\Handler::class)->render(request(), throw new \Error('dumpreport.'));
        */
	    // view関数：第一引数→resource/viewsのファイル指定(ディレクトリ構造は.で区切る)
        // view関数：第二引数→テンプレートで利用するデータ配列を渡す
        return view('tweet.index', ['tweets' => $tweets]);
    }
}
