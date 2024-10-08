<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminRequestController;
Route::get('/admin/request', [AdminRequestController::class, 'create'])->name('admin.request');
Route::post('/admin/request', [AdminRequestController::class, 'store']);

Route::get('/user/{user}/posts', [PostController::class, 'userPosts'])->name('user.posts');
route::get('/', function () {
    return view('welcome');
});
Route::get('posts/create', function () {
    return view('create');
})->middleware('auth');

Route::get('search', function () {    $post = Post::query()
    ->with([ 'tags'])
    ->where('title', 'LIKE', '%'.request('q').'%')
    ->get();

return view('results', ['posts' => $post]);});

Route::get('/posts', [PostController::class,"index"])->middleware(['auth', 'verified'])->name("index");
Route::post('/posts',[PostController::class,"store"])->middleware('auth');


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
