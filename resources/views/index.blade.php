<x-layout>
    <div class="container mx-auto">

        <h1 class="text-3xl font-bold mt-4">Latest Posts</h1>
        <div class="grid grid-cols-3 gap-4">
            @foreach ($posts as $post)
                <a href="/posts/{{ $post->id }}">
                <div class="bg-white p-4 shadow rounded ">
                    <h2 class="text-xl font-bold ">{{ $post->title }}</h2>
                    <p>{{ $post->excerpt }}</p>
                    <p class="text-sm mt>2">By {{ $post->user->name }}</p>
                    {{ $post->Tags->pluck('name')->join(', ') }}
                    <p class="text-sm mt-2">comments: {{ count($post->comments) }}</p>
                </div>
                </a>
            @endforeach
        </div>
    </div>

</x-layout>