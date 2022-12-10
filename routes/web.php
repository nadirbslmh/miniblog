<?php

use App\Http\Controllers\BlogController;
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

Route::get('/', [BlogController::class, 'index']);
Route::get('/blogs/create', [BlogController::class, 'create']);
Route::get('/blogs/{blog}', [BlogController::class, 'show']);
Route::post('/blogs', [BlogController::class, 'store']);
Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit']);
Route::put('/blogs/{blog}', [BlogController::class, 'update']);
Route::delete('/blogs/{blog}', [BlogController::class, 'destroy']);