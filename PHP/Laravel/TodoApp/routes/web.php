<?php

use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();
Route::get('/items', [App\Http\Controllers\ItemsController::class, 'index'])->name('items.index');
Route::post('/items', [App\Http\Controllers\ItemsController::class, 'store']);
Route::delete('/items/{todoItem}', [App\Http\Controllers\ItemsController::class, 'destroy']);

