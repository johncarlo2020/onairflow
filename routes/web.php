<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Events\notif;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
});


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  
    

    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard'); // Show all posts
    Route::get('/posts/create', 'PostController@create')->name('posts.create'); // Show create form
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store'); // Store new post
    Route::get('/posts/{id}', 'PostController@show')->name('posts.show'); // Show single post
    Route::get('/posts/{id}/edit', 'PostController@edit')->name('posts.edit'); // Show edit form
    
    Route::put('/posts/{id}', 'PostController@update')->name('posts.update'); // Update post
    Route::delete('/posts/{id}', 'PostController@destroy')->name('posts.destroy'); // Delete post
    Route::post('/like/{postId}', [PostController::class, 'likePost'])->name('likePost');

    Route::get('/posts/{post}/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
});

require __DIR__.'/auth.php';
