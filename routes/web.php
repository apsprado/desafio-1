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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => ['role:Administrador']], function () {

        //Usuario
        Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
        Route::get('/user.create.update', [App\Http\Controllers\UserController::class, 'create'])->name('user.create.update');
        Route::post('/user.store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
        Route::get('/user.edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
        Route::patch('/user.update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
        Route::delete('/user.delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete');
    });

    Route::group(['middleware' => ['role:Administrador|Colaborador']], function () {

        //Perfil do Usuario
        Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
        Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
        Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

        //News
        Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
        Route::get('/news.create', [App\Http\Controllers\NewsController::class, 'create'])->name('news.create');
        Route::get('/news.show/{id}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');
        Route::post('/news.store', [App\Http\Controllers\NewsController::class, 'store'])->name('news.store');
        Route::get('/news.edit/{id}', [App\Http\Controllers\NewsController::class, 'edit'])->name('news.edit');
        Route::patch('/news.update/{id}', [App\Http\Controllers\NewsController::class, 'update'])->name('news.update');
        Route::delete('/news.delete/{id}', [App\Http\Controllers\NewsController::class, 'destroy'])->name('news.delete');
    });
});
