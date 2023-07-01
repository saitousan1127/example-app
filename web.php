<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// /sampleに対するGETリクエストで\App\Http\Controllers\Sample\IndexControllerのshowメソッドを呼び出す
Route::get('/sample', [\App\Http\Controllers\sample\IndexController::class,'show']);

Route::get('/sample/{id}', [\App\Http\Controllers\sample\IndexController::class,'showId']);

Route::get('/tweet', \App\Http\Controllers\Tweet\IndexController::class)
->name('tweet.index');

Route::post('/tweet/create', \App\Http\Controllers\Tweet\CreateController::class)
->name('tweet.create'); // formのアクションで呼び出しやすいように名前を付けておく

Route::get('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\IndexController::class)  // 編集画面のController
->name('tweet.update.index')
->where('tweetId','[0-9]+');  // URLのパスパラメータに数字しか入らないようにする

Route::put('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\PutController::class)  // 編集のリクエストを受け付けるController
->name('tweet.update.put')
->where('tweetId','[0-9]+');  // URLのパスパラメータに数字しか入らないようにする


Route::delete('/tweet/delete/{tweetId}', \App\Http\Controllers\Tweet\DeleteController::class)
	->name('tweet.delete');
