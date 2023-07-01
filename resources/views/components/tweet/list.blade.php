@props([
    'tweets' => []
])
<div class="bg-white rouded-md shadow-lg mt-5 mb-5">
    <ul>
        @foreach($tweets as $tweet)
        <li class="border-b last::border-b-0 border-gray-200 p-4 flex
         items-start jusitfy-between">
            <div>
                <span class="inline-block rouded-full text-gray-600
                bg-gray-100 px-2 py-1 text-xs mb-2">
                    {{ $tweet->user->name }}
                </span>
                <p class="text-gray-600">{!! nl2br(e($tweet->content)) !!}</p>
                <x-tweet.images :images="$tweet->images"/>
            </div>
            <div>
                <!-- TODO 編集と削除 -->
                <x-tweet.options :tweetId="$tweet->id" :userId="$tweet->user_id">
                </x-tweet.options>
            </div>
        </li>
        @endforeach
    </ul>
</div>