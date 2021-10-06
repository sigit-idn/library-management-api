<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/books', [BookController::class, "get"]);
Route::get('/book/{id}', [BookController::class, "getOne"]);
Route::post('/book', [BookController::class, "post"]);
Route::put('/book/{id}', [BookController::class, "put"]);
Route::delete('/book/{id}', [BookController::class, "delete"]);

Route::get('/users', [UserController::class, "get"]);
Route::get('user/{id}', [UserController::class, "getOne"]);
Route::post('/user', [UserController::class, "post"]);
Route::put('/user/{id}', [UserController::class, "put"]);
Route::delete('/user/{id}', [UserController::class, "delete"]);

Route::get('/admins', [AdminController::class, "get"]);
Route::post('/admin', [AdminController::class, "post"]);
Route::put('/admin/{id}', [AdminController::class, "put"]);
Route::delete('/admin/{id}', [AdminController::class, "delete"]);

Route::get('/borrows', [BorrowController::class, "get"]);
Route::get('/borrow/{id}', [BorrowController::class, "getOne"]);
Route::post('/borrow', [BorrowController::class, "post"]);
Route::put('/borrow/{id}', [BorrowController::class, "put"]);
Route::delete('/borrow/{id}', [BorrowController::class, "delete"]);

Route::get('/returns', [ReturnController::class, "get"]);
Route::post('/return', [ReturnController::class, "post"]);
Route::put('/return/{id}', [ReturnController::class, "put"]);
Route::delete('/return/{id}', [ReturnController::class, "delete"]);