<x-app-layout>
<div class="container mx-auto">
<form action="/posts" method="post" class="mt-4">
    @csrf
    <input type="text" name="title" class="w-full p-4 border border-gray-300 rounded-lg" placeholder="Title">
    <textarea name="content" class="w-full p-4 mt-2 border border-gray-300 rounded-lg" placeholder="Content"></textarea>
    <button class="bg-blue-500 text-white px-4 py-2 mt-2">Add Post</button>
</form>
</div>
</x-app-layout>