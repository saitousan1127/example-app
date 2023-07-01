<?php
// Eloquent ORM:データベースとコードを１対１で結びつけるもの、
// データの取得・追加・変更・削除を行うことができる

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// クラスの名前は扱うテーブルの名前の小文字スネークケースの複数形
class Tweet extends Model
{
	use HasFactory;

	public function user()
        {
		return $this->belongsTo(User::class);  // TweetモデルからUserモデルに関連付けを行う
	}
	public function images()
	{
		return $this->belongsToMany(Image::class, 'tweet_images')->using(TweetImage::class);
	}
}
