<?php

use Illuminate\Support\Facades\Route;

// Route::middleware(CheckTableNumber::class)->group(function() {
//     Route::get('/', HomePage::class)->name('home');
//     Route::get('/makanan', AllFoodPage::class)->name('food.index');
//     Route::get('/makanan/{id}', DetailPage::class)->name('food.detail');
//     Route::get('/makanan/favorite', FavoritePage::class)->name('food.favorite');
//     Route::get('/makanan/promo', PromoPage::class)->name('food.promo');
// });

// Route::middleware(CheckTableNumber::class)->controller(TransactionController::class)->group(function() {
//     Route::get('/cart', CartPage::class)->name('payment.cart');
//     Route::get('/checkout', CheckoutPage::class)->name('payment.checkout');

//     Route::middleware('throttle:10,1')->post('/payment', 'handlePayment')->name('payment');
//     Route::get('/payment', function () { abort(404); });

//     Route::get('/payment/status/{id}', 'paymentStatus')->name('payment.status');
//     Route::get('/payment/success', PaymentSuccessPage::class)->name('payment.success');
//     Route::get('/payment/failure', PaymentFailurePage::class)->name('payment.failure');
// });

// Route::post('/payment/webhook', [TransactionController::class, 'handleWebhook'])->name('payment.webhook');

// Route::controller(QRController::class)->group(function () {
//     Route::post('/store-qr-result', 'storeResult')->name('food.scan.store');
//     Route::get('/scan', ScanPage::class)->name('food.scan');
//     Route::get('/{tableNumber}', 'checkCode')->name('food.scan.table');
// });
