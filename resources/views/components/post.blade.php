@props(['post'])
<article class="flex max-w-xl flex-col items-start justify-between">
    <div class="flex items-center gap-x-4 text-xs">
        <time datetime="2020-03-16" class="text-gray-500">{{$post->created_at}}</time>

        
    </div>
    <div class="group relative">
        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
            <a href="/posts/{{$post->id}}">
                <span class="absolute inset-0"></span>
                {{ $post->title }}
            </a>
        </h3>
        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
            {{ \Illuminate\Support\Str::words($post->content, 10) }}
        </p>
    </div>
    <div class="relative mt-8 flex items-center gap-x-4">
        <div class="text-sm leading-6">
            <p class="font-semibold text-gray-900">
                <a href="#" class="flex items-center">
                    <img src="{{ asset($post->user->pfp) }}" alt="Profile Picture" class="w-10 h-10 rounded-full mr-2">
                    {{ $post->user->name }}
                </a>
            </p>
            <div class="flex items-center gap-x-4 mt-2">
                
            <span class="text-sm mt-2 flex items-center"><x-comment-icon></x-comment-icon> {{ count($post->comments) }}</span>
            @foreach ($post->tags as $tag)
            <a href="/tags/{{ strtolower($tag->name) }}"  class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $tag->name }}</a>
            </div>
        @endforeach
        </div>
    </div>
</article>