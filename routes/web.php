<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])
    ->name('users.edit')
    ->where('id', '[0-9]+'); 
Route::put('/users/{id}', [UserController::class, 'update'])
    ->name('users.update')
    ->where('id', '[0-9]+');
Route::delete('/users/{id}', [UserController::class, 'destroy'])
    ->name('users.destroy')
    ->where('id', '[0-9]+');
Route::view('/userviews/avisos', 'userviews.avisos')->name('userviews.avisos');