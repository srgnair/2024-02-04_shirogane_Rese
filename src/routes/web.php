<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShopController;

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

Route::get('/register', [UserController::class, 'registerView']);
Route::get('/thanks', [UserController::class, 'thanks']);
Route::get('/login', [LoginController::class, 'loginView'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [ShopController::class, 'allShops'])->name('home');
Route::get('/detail/{id}', [ShopController::class, 'detail'])->name('detail');
Route::post('/detail', [ShopController::class, 'reserve'])->name('reserve');
Route::get('/reserve', [ShopController::class, 'completeReserve'])->name('completeReserve');
Route::get('/mypage', [ShopController::class, 'mypage'])->name('mypage');
Route::delete('/mypage', [ShopController::class, 'delete'])->name('delete');

// authミドルウェアで認証済みかチェックする
// Route::middleware('auth')->group(function () {
//     Route::get('/', [ShopController::class, 'allShops']);
// });

Route::post('/register', [UserController::class, 'register'])->name('register');
