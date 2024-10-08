<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SocialiteController;
use App\Http\Middleware\UserAuthMiddleware;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\CheckoutPage;
use App\Livewire\HomePage;
use App\Livewire\KeranjangPage;
use App\Livewire\OrderCancel;
use App\Livewire\OrderDetail;
use App\Livewire\OrderHistoryPage;
use App\Livewire\Payment;
use App\Livewire\ProdukDetailPage;
use App\Livewire\ProdukPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::get('/produk', ProdukPage::class)->name('produk');
Route::get('/produk/{id}', ProdukDetailPage::class)->name('produk.detail');
Route::get('/keranjang', KeranjangPage::class)->name('keranjang');

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/auth/redirect', [SocialiteController::class, 'redirect'])->name('auth.google.redirect');
});
Route::get('/callback', [SocialiteController::class, 'callback'])->name('auth.google.callback');

Route::middleware('auth')->get('/user/logout', function () {
    Auth::logout();
    Session::flush();
    return redirect()->route('home');
});
Route::middleware([UserAuthMiddleware::class])->group(function () {
    Route::get('/checkout', CheckoutPage::class)->name('checkout');
    Route::get('/payment/cancel', OrderCancel::class)->name('payment.cancel');
    Route::get('/payment/failed', [CheckoutController::class, 'failed'])->name('payment.failed');
    Route::get('/payment', [CheckoutController::class, 'index'])->name('payment');
    Route::get('/order/riwayat', OrderHistoryPage::class)->name('order.riwayat');
    Route::get('/order/detail', OrderDetail::class)->name('payment.success');
});
