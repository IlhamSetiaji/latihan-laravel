<?php

use App\Http\Controllers\BookController;
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

Route::get('/', [BookController::class, 'index']);
Route::get('/add-book', [BookController::class, 'addBook']);
Route::post('/store-book', [BookController::class, 'storeBook']);
Route::get('/edit/{bookID}/book', [BookController::class, 'editBook']);
Route::post('/update/{bookID}/book', [BookController::class, 'updateBook']);
Route::get('/delete/{bookID}/book', [BookController::class, 'deleteBook']);