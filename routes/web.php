<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
Route::get('/', function () {
    return view('index', [
        'posts' => Post::all(),
    ]);
});
Route::get('/posts/{post}', function (Post $post) {
    $comments = $post->comments;
    return view('post', [
        'post' => $post,
        'comments' => $comments,
    ]);
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/about', function () {
    return view('about');
});
//add auth middleware
Route::post('/posts/{post}/comments', function (Post $post) {
    $post->comments()->create([
        'content' => request('content'),
        'user_id' => 1,
    ]);
    return back();
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get("signup", function () {
    return view("signup");
}); 
