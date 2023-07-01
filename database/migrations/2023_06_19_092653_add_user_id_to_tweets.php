<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
	    Schema::table('tweets', function (Blueprint $table) {
		// 'id'カラムの後ろにunsignedBigInteger型の'user_id'カラムを追加する
		$table->unsignedBigInteger('user_id')->after('id');

		// usersテーブルのidカラムにuser_idカラムを関連付けます。（user_idにはusersの値しか入れない）
		$table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tweets', function (Blueprint $table) {
		$table->dropForeign('tweets_user_id_foreign');
		$table->dropColumn('user_id');
        });
    }
};
