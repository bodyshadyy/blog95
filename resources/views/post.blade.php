<x-app-layout>
    <div class="container mx-auto">
        

        <img src="{{ asset($post->photo) }}" alt="Banner Image" class="w-full mt-4 max-h-96">
        <h1 class="text-3xl font-bold mt-4">{{ $post->title }}</h1>
        <p class="text-sm mt-2">By {{ $post->user->name }}</p>
        <p>{{ $post->content }}</p>
    </div>
    <div class="mt-2">
        <h4 class=" font-bold mt-4">Comments</h4>
        <form action="/posts/{{ $post->id }}/comments" method="post">
            @csrf
            <textarea name="content" class="w-full mt-2" placeholder="Your comment"></textarea>
            <button class="bg-blue-500 text-white px-4 py-2 mt-2">Add Comment</button>
        </form>
        @foreach ($comments as $comment)
            <div class="bg-gray-100 p-4 mt-4">
                <strong>{{ $comment->user->name }}</strong>
                <p>{{ $comment->content }}</p>
            </div>
        @endforeach
    </div>
    
</x-app-layout>