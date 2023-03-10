<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/cart', function () {
//    return 'add';
//});

Route::get('posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::post('posts', [\App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::get('posts/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
Route::get('posts/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
Route::patch('posts/{post}', [\App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [\App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');


Route::get('/adduser', [\App\Http\Controllers\UserController::class, 'addUsers'])->name('adduser.adduser');
Route::get('/users', [\App\Http\Controllers\UserController::class, 'getUsers']);

Route::resource('/photos', \App\Http\Controllers\PhotoController::class);

