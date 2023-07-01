<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;
use App\Services\TweetService;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
	public function __invoke(CreateRequest  $request, TweetService $tweetService)  // 引数に指定することでリクエストを受け取る
    {
	    $tweetService->saveTweet(
			$request->userId(),
			$request->tweet(),
			$request->images()
		);
	    return redirect()->route('tweet.index');  // redirectヘルパー：元の画面に戻してあげる
    }
}
