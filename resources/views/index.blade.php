<x-layout>
    <div class="container mx-auto">

        <h1 class="text-3xl font-bold mt-4">Latest Posts</h1>

        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                
                <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:mt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                    @foreach ($posts as $post)
                        <x-post :post="$post"></x-post>                       <!-- <a href="/posts/{{ $post->id }}">
                           
                                <p>{{ $post->excerpt }}</p>
                            
                                {{ $post->Tags->pluck('name')->join(', ') }}
                                <p class="text-sm mt-2">comments: {{ count($post->comments) }}</p>
                            </div> -->
                    @endforeach

                    
                </div>
                {{ $posts->links() }}
            </div>
           
        </div>

    </div>
</x-layout>