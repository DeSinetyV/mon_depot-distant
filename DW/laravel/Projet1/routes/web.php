<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', [PostController::class,'index'])->name('welcome');
Route::get('/posts/{id}', [PostController::class,'show'])-> whereNumber('id');
Route::get('/contact', [PostController::class,'contact'])->name('contact');



//Route::get('/', 'App\Http\Controllers\PostController@index');
 
 
// Route::get('/', function () {
//     return view('articles');
// });


// Route::get('/posts', function () {
//     return response() ->json( [
//         'title' => 'mon super titre',
//        'description' => 'ma suer description'  
//     ]);
// });


// Route::get('articles', function () {
//     return view('articles');
// });
