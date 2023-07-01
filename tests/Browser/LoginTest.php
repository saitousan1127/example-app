<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testSuccessfulLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();  // テスト用データを作成する
            $browser->visit('/login')
                    ->type('email', $user->email)  // テスト用のユーザのメールアドレスを指定する
                    ->type('password', 'password')
                    ->press('LOG IN')
                    ->assertPathIs('/tweet')  // /tweetに遷移したことを確認する
                    ->assertSee('つぶやきアプリ');
        });
    }
}
