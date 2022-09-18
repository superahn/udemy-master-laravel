<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
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

Route::get('/', [HomeController::class, 'home'])->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/single', AboutController::class);

$posts = [
    1 => [
        'title' => 'Intro to Laravel',
        'content' => 'This is a short intro to Laravel'
    ],
    2 => [
        'title' => 'Intro to PHP',
        'content' => 'This is a short intro to PHP'
    ],
    3 => [
        'title' => 'Intro to React',
        'content' => 'This is a short intro to React'
    ]
];

Route::resource('posts', PostsController::class)->only(['index', 'show']);
// Route::get('/posts', function() use($posts) {
//     return view('posts.index', ['posts' => $posts]);
// })->name('posts.index');

// Route::get('/post/{id}', function($id) use($posts) {
//     abort_if(!isset($posts[$id]), 404);

//     return view('posts.show', ['post' => $posts[$id]]);
// })
//     //->where('id', '[0-9]+')
//     ->name('posts.show');

// grouping routes for /fun
Route::prefix('/fun')->name('fun.')->group(function() use($posts) {
    Route::get('responses', function() use($posts) {
        return response($posts, 201)
            ->header('Content-Type', 'application/json')
            ->cookie('MY_COOKIE', 'Sung Ahn', 3600);
    })->name('responses');
    
    Route::get('json', function() use($posts) {
        return response()->json($posts);
    })->name('json');
    Route::get('download', function() use($posts) {
        return response()->download(public_path('/daniel.jpg'), 'face.jpg');
    })->name('downloads');
});
