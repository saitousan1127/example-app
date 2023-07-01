<?php
# データベース内のテーブルの初期値を決める

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;
use App\Models\Tweet;  // Tweetモデルを使う
use App\Models\Image;

class TweetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
	    /**
	    DB::table('tweets')->insert([
		    'content' => Str::random(100),
		    'created_at' => now(),
		    'updated_at' => now(),
	    ]);
	    **/

	 //TweetのEloquentモデルを呼び出し、factoryメソッドからcontentメソッドをチェーンし、createメソッド実行
	    Tweet::factory()->count(10)->create()->each(fn($tweet) =>
		    Image::factory()->count(4)->create()->each(fn($image) =>
			    $tweet->images()->attach($image->id)
			)
	    );  // content(10)で１０レコード作成
    }
}
