<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CorrectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SkpdController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/auth', [AuthController::class, 'auth']);

Route::get('/transaction', [TransactionController::class, 'index']);
Route::get('/transaction/create', [TransactionController::class, 'create']);
Route::post("/transaction/store", [TransactionController::class, 'store']);
Route::get('/transaction/edit/{id}', [TransactionController::class, 'edit']);
Route::post('/transaction/update/{id}', [TransactionController::class, 'update']);
Route::get('/transaction/export', [TransactionController::class, 'export']);
Route::get('/transaction/delete/{id}', [TransactionController::class, 'destroy']);
Route::get('/transaction/duplicate/{id}', [TransactionController::class, 'duplicate']);
Route::post('/transaction/copy/{id}', [TransactionController::class, 'copy']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/store', [UserController::class, 'store']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::get('/user/export', [UserController::class, 'export']);
Route::get('/user/destroy/{id}', [UserController::class, 'destroy']);

Route::get('/skpd', [SkpdController::class, 'index']);
Route::get('/skpd/create', [SkpdController::class, 'create']);
Route::post('/skpd/store', [SkpdController::class, 'store']);
Route::get('/skpd/edit/{id}', [SkpdController::class, 'edit']);
Route::post('/skpd/update/{id}', [SkpdController::class, 'update']);
Route::get('/skpd/export', [SkpdController::class, 'export']);
Route::get('/skpd/destroy/{id}', [SkpdController::class, 'destroy']);

Route::get('/correction/create/{id}', [CorrectionController::class, 'create']);
Route::post('/correction/store/{id}', [CorrectionController::class, 'store']);
Route::get('/correction/edit/{id}', [CorrectionController::class, 'edit']);
Route::get('/correction/show/{id}', [CorrectionController::class, 'show']);
Route::post('/correction/update/{id}', [CorrectionController::class, 'update']);
Route::get('/correction/destroy/{id}', [CorrectionController::class, 'destroy']);