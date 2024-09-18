<?php

namespace App\Http\Controllers;
use App\Models\Tag;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File ;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index', [
            'posts' => Post::latest()->paginate(9),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $att=$request->validate([
        'title' => ['required', 'string', 'max:255'],
        'content' => ['required', 'string'],
        'tags' => ['nullable', 'string'],
        'photo' => ['required', File::types(['jpg', 'jpeg', 'png'])]
    ]);
    $photo_link = $request->photo->store('photos');
    $post = Post::create([
        'title' => $att['title'],
        'content' => $att['content'],
        'user_id' => auth()->id(),
        'photo' => $photo_link,
    ]);

    // // App\Models\Post::create([['title'=>'dsd',"content"=>'dsd',"photo"=>'dsd']]);        

    // Use the $post variable to avoid the unused variable warning
    if ($request->tags) {
        $tags = explode(',', $request->tags);
        foreach ($tags as $tag) {
            $tag = trim($tag);
            if ($tag) {
                $tagModel = Tag::firstOrCreate(['name' => $tag]);
                $post->tags()->attach($tagModel);
            }
        }
    }

    if ($request->tags) {
        // $tags = explode(separator: ',', $request->tags);
        // foreach ($tags as $tag) {
        //     $tag = trim($tag);
        //     if ($tag) {
        //         $tagModel = Tag::firstOrCreate(['name' => $tag]);
        //         $post->tags()->attach($tagModel);
        //     }
        // }
    }

    return redirect()->route('index')->with('success', 'Post created successfully.');
  
}

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
