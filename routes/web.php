<?php

namespace DevImobiliaria\Http\Controllers;

use Illuminate\Support\Facades\Route;
use DevImobiliaria\Http\Controllers\PostController;
use DevImobiliaria\Http\Controllers\UserController;
use DevImobiliaria\Http\Controllers\Admin\UsersController;
use DevImobiliaria\Http\Controllers\Admin\TestController;

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

Route::resourceVerbs([
    'create' => 'cadastro',
    'edit' => 'editar'
]);

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route::view('/form', [PropertyController::class, 'edit']);
//Route::view('/form','form');

/*
Route::get($uri, $callback);
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::patch($uri, $callback);
Route::delete($uri, $callback);
Route::options($uri, $callback);

Route::get('/users/1', [UserController::class, 'index']);
Route::get('/getData', [UserController::class, 'getData']);

Route::post('/postData', [UserController::class, 'postData']);

Route::put('/users/1', [UserController::class, 'testePut']);

Route::patch('/users/1', [UserController::class, 'testePatch']);

Route::match(['PUT', 'PATCH',], '/users/2', [UserController::class, 'testeMatch']);

Route::delete('/users/1', [UserController::class, 'destroy']);

Route::any('/users', [UserController::class, 'any']);*/

//Route::get('/posts/premium', [PostController::class, 'premium']);
//Route::resource('posts', PostController::class);
//Route::resource('posts', PostController::class)->only(['index', 'show']);
//Route::resource('posts', PostController::class)->except(['destroy']);
//Route::get('/posts', [PostController::class, 'index']);

/*Route::get('/users', function(){
    echo "Listagem dos users da base";
});

Route::view('/form', 'form');

Route::fallback(function(){
    echo "<h1>Ops!! Página 404 - Nenhum registro encontrado!</h1>";
});

Route::redirect('/users/add', url('/form'), 301);

Route::get('/artigos', [PostController::class, 'index'])->name('posts.index');
Route::get('/artigos/index', [PostController::class, 'indexRedirect'])->name('posts.indexRedirect');*/

/*Route::get('users/{id}/comments/{comment}', function($id, $comment) {
    var_dump($id, $comment);
});*/

/*Route::get('users/{id}/comments/{comment?}', function($id, $comment = null) {
    var_dump($id, $comment);
})->where('id', '[0-9]+');

Route::get('users/{id}/comments/{comment?}', function($id, $comment = null) {
    var_dump($id, $comment);
})->where(['id' => '[0-9]+', 'comment' => '[0-9]+']);

Route::get('users/{id}/comments/{comment?}', [UserController::class, 'userComments'])->where(['id' => '[0-9]+', 'comment' => '[0-9]+']);

Route::get('/users/1', [UserController::class, 'inspect'])->name('inspect');*/

/*Route::prefix('admin')->group(function() {
    Route::view('/form', 'form');
});

Route::name('admin.posts.')->group(function() {
    Route::get('/admin/posts/index', [PostController::class, 'index'])->name('index');
    Route::get('/admin/posts', [PostController::class, 'show'])->name('show');
});

Route::middleware(['throttle:10,1'])->group(function () {
    Route::view('/form', 'form');
});

Route::namespace('Admin')->group(function() {
    Route::get('/users', [UserController::class, 'index']);
});

Route::group(['namespace' => 'Admin'], function() {
    Route::get('/users', [UserController::class, 'index']);
});

Route::namespace('Admin')->group(function() {
    Route::resource('/users', [UserController::class, 'index']);
});*/

/*Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['throttle:10,1'], 'as' => 'admin.'], function() {
    Route::resource('users', [UsersController::class]);
});*/

/*Route::namespace('Admin')->group(function() {
    Route::resource('/users', [UsersController::class, 'index']);
});*/

/*Route::namespace('Admin')->prefix('admin')->group(function(){
    //Route::get('/users', [UsersController::class, 'index']);
    Route::resource('/users', [UsersController::class, 'index']);
  });*/

/*Route::prefix('admin.')->group(function () {
Route::get('users', [UsersController::class, 'index']);
//Route::resource('users', UsersController::class);

});*/

Route::name('admin.users.')->prefix('admin')->middleware(['throttle:10,1'])->group(function() {
    Route::get('/users', [UsersController::class, 'index'])->name('index');
    Route::resource('test', TestController::class);
});