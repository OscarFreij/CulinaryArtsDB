<?php

use Illuminate\Support\Facades\Route;
use App\Models\Recipe;
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
    return view('home', ['heading' => 'Home']);
});

Route::get('/browse', function () {
    return view('browse', [
        'heading' => 'Browse recipes',
        'recipes' => Recipe::all()
    ]);
});

Route::get('/recipe/{id}', function ($id) {
    return view('recipe', [
        'heading' => 'Recipe',
        'recipe' => Recipe::find($id)
    ]);
})->where('id', '[0-9]+');


Route::get('/profile/{username}', function ($username) {
    return view('profile', [
        'heading' => $username.'\'s profile',
        'username' => $username
    ]);
});