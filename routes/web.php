<?php

use App\Livewire\CheckoutPage;
use App\Livewire\HomePage;
use App\Livewire\KeranjangPage;
use App\Livewire\OrderHistoryPage;
use App\Livewire\ProdukDetailPage;
use App\Livewire\ProdukPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::get('/produk', ProdukPage::class)->name('produk');
Route::get('/produk/overview', ProdukDetailPage::class)->name('produk.detail');
Route::get('/keranjang', KeranjangPage::class)->name('keranjang');
Route::get('/checkout', CheckoutPage::class)->name('checkout');
Route::get('/order/riwayat', OrderHistoryPage::class)->name('order.riwayat');
