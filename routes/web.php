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
})->name('home');

Route::get('/login', function () {
    \Illuminate\Support\Facades\Auth::loginUsingId(1);

    return redirect()->route('home');
});


Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('/posts/edit/{id}', [\App\Http\Controllers\PostController::class, 'edit']);
