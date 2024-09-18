<x-app-layout>
<div class="container mx-auto  max-w-7xl px-6 lg:px-8">
    <div class="">
<form action="/posts" method="post" class="mt-4"  enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" class="w-full p-4 border border-gray-300 rounded-lg" placeholder="Title">

    <textarea name="content" class="w-full p-4 mt-2 border border-gray-300 rounded-lg" placeholder="Content"></textarea>
    
    <input type="text" name="tags" class="w-full p-4 mt-2 border border-gray-300 rounded-lg" placeholder="Tags (comma separated)">
<input type="file" name="photo" class="w-full p-4 mt-2 border border-gray-300 rounded-lg" placeholder="Photo">    
    <button class="bg-blue-500 text-white px-4 py-2 mt-2">Add Post</button>
</form>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

</x-app-layout>