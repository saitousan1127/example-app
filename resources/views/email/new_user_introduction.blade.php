@component('mail::message')
# 新しいユーザが参加しました！

{{ $toUser->name }}さんこんにちは！

@component('mail::panel')
    新しく{{ $newUser->name }}さんが参加しましたよ！
@endcomponent

@component('mail::button', ['url' => route('tweet.index')])
    つぶやきを見に行く
@endcomponent

@endcomponent