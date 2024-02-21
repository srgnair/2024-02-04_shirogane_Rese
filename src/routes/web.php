<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;

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
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/thanks', [UserController::class, 'registerThanks'])->name('thanks');

Route::get('/login', [LoginController::class, 'loginView'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [ShopController::class, 'allShopsView'])->name('home');

Route::post('/{shop_id}', [LikeController::class, 'like'])->name('like');
Route::delete('/{shop_id}', [LikeController::class, 'deleteLike'])->name('deleteLike');

Route::get('/detail/{id}', [ShopController::class, 'detailView'])->name('detail');
Route::get('/mypage', [ShopController::class, 'mypageView'])->name('mypage');

Route::post('/detail/(shop_id)', [ReserveController::class, 'reserve'])->name('reserve');
Route::post('/detail/{shop_id}/edit', [ReserveController::class, 'reserveEdit'])->name('reserveEdit');
Route::get('/reserve', [ReserveController::class, 'reserveComplete'])->name('completeReserve');
Route::delete('/mypage/{id}', [ReserveController::class, 'reserveDelete'])->name('delete');

Route::post('/detail/review', [ReviewController::class, 'review'])->name('review');

Route::get('/admin/shop', [LoginController::class, 'shopAdminView'])->name('shopAdminView');
Route::get('/admin/main', [LoginController::class, 'mainAdminView'])->name('mainAdminView');

Route::get('/admin/shop/addnewshop', [AdminController::class, 'addNewShopView'])->name('addNewShopView');
Route::post('/admin/shop/addnewshop', [AdminController::class, 'addNewShop'])->name('addNewShop');

Route::get('/admin/shop/editshop', [AdminController::class, 'editShopView'])->name('editShopView');
Route::post('/admin/shop/editshop', [AdminController::class, 'editShop'])->name('editShop');

Route::get('/admin/shop/readreserves', [AdminController::class, 'readReserves'])->name('readReserves');

Route::get('/admin/main/addNewPartner', [AdminController::class, 'addNewPartnerView'])->name('addNewPartnerView');
Route::post('/admin/main/addNewPartner', [AdminController::class, 'addNewPartner'])->name('addNewPartner');

// authミドルウェアで認証済みかチェックする
// Route::middleware('auth')->group(function () {
//     Route::get('/', [ShopController::class, 'allShops']);
// });
