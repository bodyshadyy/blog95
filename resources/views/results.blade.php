<x-app-layout>
<h1 class="font-bold text-center text-4xl ">results</h1>

<div class="my-2 bg-white pb-5 sm:pb-3">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">            
                <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:mt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        @foreach($posts as $post)
            <x-post :$post />
            
        @endforeach
    </div>
</div>
</div>
</x-app-layout>
