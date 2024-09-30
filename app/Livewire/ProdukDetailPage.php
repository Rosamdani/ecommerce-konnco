<?php

namespace App\Livewire;

use App\Livewire\Partials\Navbar;
use App\Models\Produk;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Helpers\CartManagement;


#[Title('Detail Produk')]
#[Lazy]
class ProdukDetailPage extends Component
{
    public $produk_id;
    public $produk_stok;

    public $qty;

    public function mount($id)
    {
        $this->produk_id = $id;
        $this->qty = CartManagement::getProdukStok($this->produk_id);
        $produk = Produk::where('id', $this->produk_id)->first(['stok']);
        $this->produk_stok = $produk->stok;
    }

    public function placeholder()
    {
        return view('placeholders.produk-detail');
    }

    public function addToCart($produk_id)
    {
        $total_count = CartManagement::addItemToCart($produk_id);
        $this->dispatch('update-count-cart', total_count: $total_count)->to(Navbar::class);
        $this->qty = 1;
    }

    public function increaseQty()
    {
        $this->qty >= $this->produk_stok ? $this->qty = $this->produk_stok : $this->qty++;
        return CartManagement::incrementCartItem($this->produk_id);
    }

    public function decreaseQty()
    {
        $this->qty <= 0 ? $this->qty = 0 : $this->qty--;
        return CartManagement::decrementCartItem($this->produk_id);
    }
    public function getProdukStok()
    {
        $produk = Produk::where('id', $this->produk_id)->first(['stok']);
        return $produk->stok;
    }

    public function render()
    {
        $produk = Produk::where('id', $this->produk_id)->firstOrFail();
        return view('livewire.produk-detail-page', [
            'produk' => $produk
        ]);
    }
}
