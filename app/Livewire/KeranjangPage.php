<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Produk;
use Livewire\Component;

class KeranjangPage extends Component
{
    public $my_cart = [];
    public $subtotal = 0;
    public $grandtotal = 0;
    public $stockErrors = [];


    public $estimateTax = 0;

    public function mount()
    {
        $this->my_cart = CartManagement::getCartItemCookie();
        $this->subtotal = CartManagement::calculateGrandTotal($this->my_cart);
        $this->insertStokToMyCart();
        $this->estimateTotal();
    }

    // estimate tax (3percent from subtotal)
    public function estimateTax()
    {
        $this->estimateTax = $this->subtotal * 0.03;
        return $this->estimateTax;
    }


    // estimate total
    public function estimateTotal()
    {
        $this->grandtotal = $this->subtotal + $this->estimateTax();
    }

    // Cek produk stok
    public function cekProdukStok($id)
    {
        $product = Produk::where('id', $id)->first(['stok']);
        if ($product) {
            return $product->stok;
        }
        return 0;
    }

    public function insertStokToMyCart()
    {
        foreach ($this->my_cart as $key => $item) {
            $this->my_cart[$key]['stok'] = $this->cekProdukStok($item['id']);
        }
    }

    public function cekProdukStokFromDB()
    {
        $this->stockErrors = [];

        foreach ($this->my_cart as $item) {
            $availableQty = $this->cekProdukStok($item['id']);
            if ($availableQty < $item['qty']) {
                $this->stockErrors[] = [
                    'product_id' => $item['id'],
                    'product_name' => $item['nama'],
                    'requested_qty' => $item['qty'],
                    'available_qty' => $availableQty,
                ];
            }
        }

        if (empty($this->stockErrors)) {
            // Jika tidak ada kesalahan, arahkan ke halaman checkout
            return redirect()->route('checkout');
        }
    }

    public function removeFromCart($produk_id)
    {
        $this->my_cart = CartManagement::removeItemFromCart(produk_id: $produk_id);
        $this->reloadCart();
        $this->dispatch('update-count-cart', total_count: count($this->my_cart))->to(Navbar::class);
    }

    public function increaseQty($produk_id)
    {
        if (CartManagement::getProdukStok($produk_id) < $this->cekProdukStok($produk_id)) {
            $this->my_cart = CartManagement::incrementCartItem($produk_id);
            $this->reloadCart();
        }
    }

    public function reloadCart()
    {
        $this->insertStokToMyCart();
        $this->subtotal = CartManagement::calculateGrandTotal($this->my_cart);
        $this->estimateTotal();
    }

    public function decreaseQty($produk_id)
    {
        $this->my_cart = CartManagement::decrementCartItem($produk_id);
        $this->reloadCart();
    }

    public function render()
    {
        return view('livewire.keranjang-page');
    }
}
