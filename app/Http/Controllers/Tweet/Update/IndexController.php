<?php
// 編集画面を表示する

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
	    $tweetId = (int) $request->route('tweetId');  // tweet_idを取得
	    if (!$tweetService->checkOwnTweet($request->user()->id, $tweetId)) {
		    throw new AccessDeniedHttpException();
	    }
	    // tweet_idが一致するものを見つけ、複数あったら最初の一つ、無かったら例外404
	    $tweet = Tweet::where('id', $tweetId)->firstOrFail();
	    return view('tweet.update')->with('tweet', $tweet);  // 編集画面を表示
    }
}
