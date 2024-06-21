<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\AdminShopController;
use App\Http\Controllers\AdminEmailController;
use App\Http\Controllers\AdminPartnerController;
use App\Http\Controllers\AdminReservesController;

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

Route::get('/phpinfo', [UserController::class, 'phpinfo']);

Route::get('/register', [UserController::class, 'registerView']);
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/thanks', [UserController::class, 'registerThanks'])->name('thanks');

Route::get('/login', [LoginController::class, 'loginView'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login/verification_required', [LoginController::class, 'verificationRequiredView'])->name('varificationRequired');

Route::middleware(['web', 'auth', 'verified'])->group(
    function () {
        Route::get('/', [ShopController::class, 'allShopsView'])->name('home');
        Route::get('/detail/{id}', [ShopController::class, 'detailView'])->name('detail');

        Route::get('/mypage', [MypageController::class, 'mypageView'])->name('mypage');

        Route::get('/post_review/{shop_id}', [ReviewController::class, 'postReviewView'])->name('postReviewView');
        Route::post('/post_review/{shop_id}', [ReviewController::class, 'postReview'])->name('postReview');
        Route::delete('/delete_review/{review_id}/{shop_id}', [ReviewController::class, 'deleteReview'])->name('deleteReview');
        Route::get('/edit_review/{review_id}/{shop_id}', [ReviewController::class, 'editReviewView'])->name('editReviewView');
        Route::put('/edit_review/{review_id}/{shop_id}', [ReviewController::class, 'update'])->name('editReview');

        Route::post('/{shop_id}', [LikeController::class, 'like'])->name('like');
        Route::delete('/{shop_id}', [LikeController::class, 'deleteLike'])->name('deleteLike');

        Route::post('/detail/{shop_id}', [ReserveController::class, 'reserve'])->name('reserve');
        Route::post('/detail/{shop_id}/edit', [ReserveController::class, 'reserveEdit'])->name('reserveEdit');
        Route::get('/reserve', [ReserveController::class, 'reserveCompleteView'])->name('completeReserve');
        Route::delete('/mypage/{id}', [ReserveController::class, 'reserveDelete'])->name('delete');

        Route::get('/admin/shop', [AdminController::class, 'shopAdminView'])->name('shopAdminView');

        Route::get('/admin/shop/add_new_shop', [AdminShopController::class, 'addNewShopView'])->name('addNewShopView');
        Route::post('/admin/shop/add_new_shop', [AdminShopController::class, 'addNewShop'])->name('addNewShop');

        Route::get('/admin/shop/edit_shop', [AdminShopController::class, 'editShopView'])->name('editShopView');
        Route::post('/admin/shop/edit_shop', [AdminShopController::class, 'editShop'])->name('editShop');

        Route::get('/admin/shop/show_reserves', [AdminReservesController::class, 'showReserves'])->name('showReserves');
        Route::get('/today_reserves', [AdminReservesController::class, 'todayReserves'])->name('todayReserves');

        Route::get('/admin/shop/send_email', [AdminEmailController::class, 'sendEmailView'])->name('sendEmailView');
        Route::post('/admin/shop/send_email', [AdminEmailController::class, 'sendEmail'])->name('sendEmail');

        Route::get('/admin/main/add_new_partner', [AdminPartnerController::class, 'addNewPartnerView'])->name('addNewPartnerView');
        Route::post('/admin/main/add_new_partner', [AdminPartnerController::class, 'addNewPartner'])->name('addNewPartner');

        Route::prefix('payment')->name('payment.')->group(function () {
            Route::get('/create', [PaymentController::class, 'paymentView'])->name('create');
            Route::post('/store', [PaymentController::class, 'payment'])->name('store');
        });

        Route::get('/login/show_qr_reader', [QrCodeController::class, 'showQrReaderView'])->name('showQrReaderView');
        Route::post('/login/show_qr_reader', [QrCodeController::class, 'showQrReader'])->name('showQrReader');
    }
);
