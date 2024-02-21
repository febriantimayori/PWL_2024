<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
// use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\PhotoController;

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

/*Route::get('/', function () {
    return ('Selamat Datang');
}); */
Route::get('/', [HomeController::class, 'index']);

//Basic Route
/*Route::get('/hello', function () {
    return 'Hello World';
}); */

Route::get('/hello', [WelcomeController::class,'hello']);

Route::get('/world', function () {
    return 'World';
});   

/*Route::get('/about', function () {
    return 'Nama saya adalah Febrianti Mayori dengan NIM: 2241720248';
}); */
Route::get('/about', [AboutController::class,'about']);

//Route Parameters
Route::get('/user/{name}', function ($name) {
    return 'Nama saya '.$name;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
});

/* Route::get('/articles/{id}', function ($id) {
    return 'Halaman Artikel dengan ID' .$id;
}); */
Route::get('/articles/{id}', [ArticlesController::class,'articles']);


//Optional Paramaters
Route::get('/user/{name?}', function ($name='John') {
    return 'Nama saya '.$name;
});

//Resource Controller
Route::resource('photos', PhotoController::class);

Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);

Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);

//View
// Route::get('/greeting', function () {
//     return view('hello', ['name' => 'Febrianti Mayori']);
// });

//View dalam direktori
Route::get('/greeting', function () {
    return view('blog.hello', ['name' => 'Febrianti Mayori']);
});

//Menampilkan view dari controller
Route::get('/greeting', [WelcomeController::class,'greeting']);
    