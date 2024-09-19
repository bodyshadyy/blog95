<x-app-layout>

    <h1>Posts by {{ $user->name }}</h1>

    @if ($posts->isEmpty())
        <p>No posts found.</p>
    @else
        <ul>
            @foreach ($posts as $post)
                <x-post :post="$post" />
            @endforeach
        </ul>
    @endif
</x-app-layout>