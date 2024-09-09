<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\TagController;


route::get('/', function () {
    return view('welcome');
});
Route::get('search', function () {    $post = Post::query()
    ->with([ 'tags'])
    ->where('title', 'LIKE', '%'.request('q').'%')
    ->get();

return view('results', ['posts' => $post]);});

Route::get('/posts', function () {
    return view('index', [
        'posts' => Post::latest()->paginate(9),
    ]);
})->middleware(['auth', 'verified'])->name("index");
Route::post('/posts', function () {
    request()->validate([
        'title' => 'required',
        'content' => 'required',
    ]);
    auth()->user()->posts()->create([
        'title' => request('title'),
        'content' => request('content'),
    ]);
    return redirect('/posts');
})->middleware('auth');


Route::get('/tags/{tag:name}', TagController::class);
Route::get('/creator/{user:name}', TagController::class);

Route::get('/posts/{post}', function (Post $post) {
    $comments = $post->comments;
    return view('post', [
        'post' => $post,
        'comments' => $comments,
    ]);
});
Route::post('/posts/{post}/comments', function (Post $post) {
    $post->comments()->create([
        'content' => request('content'),
        'user_id' => auth()->id(),
    ]);
    return back();
})->middleware('auth');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
