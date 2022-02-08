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


Auth::routes();

Route::post('/follow/{user}', [App\Http\Controllers\followscontroller::class, 'store']);
Route::get('/isfollow/{user}', [App\Http\Controllers\followscontroller::class, 'isfollow']);
Route::get('/followings/{user}', [App\Http\Controllers\followscontroller::class, 'show']);
Route::get('/followers/{user}', [App\Http\Controllers\followscontroller::class, 'go']);


Route::get('/', [App\Http\Controllers\postcontroller::class, 'index']);
Route::get('/posts/create', [App\Http\Controllers\postcontroller::class, 'create'])->name('profile.create');
Route::post('/p', [App\Http\Controllers\postcontroller::class, 'store'])->name('profile.post');
Route::delete('/p/{post}/delete', [App\Http\Controllers\postcontroller::class, 'destroy'])->name('profile.destroy');
Route::get('/p/{post}', [App\Http\Controllers\postcontroller::class, 'show']);


Route::get('/profile/{user}', [App\Http\Controllers\Profilescontroller::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\Profilescontroller::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\Profilescontroller::class, 'update'])->name('profile.update');
Route::get('/search', [App\Http\Controllers\Profilescontroller::class, 'search']);
