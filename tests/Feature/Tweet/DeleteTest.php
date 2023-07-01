<?php

namespace Tests\Feature\Tweet;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Tweet;

class DeleteTest extends TestCase
{
    use RefreshDatabase;  // テスト実行前後にDBが初期化される（元あるデータが存在する場合、不整合が起きる）
    /**
     * A basic feature test example.
     */
    public function test_delete_successed(): void
    {
        $user = User::factory()->create();  // ユーザを作成

        $tweet = Tweet::factory()->create(['user_id' => $user->id]);  // つぶやきを作成

        $this->actingAs($user);  // 指定したユーザーでログインした状態にする

        $response = $this->delete('/tweet/delete/' . $tweet->id);

        $response->assertRedirect('/tweet');
    }
}
