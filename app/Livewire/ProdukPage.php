<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Produk;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Produk kami')]
#[Lazy]
class ProdukPage extends Component
{

    public function placeholder()
    {
        return view('placeholders.produk-page');
    }


    public function addToCart($produk_id)
    {
        $total_count = CartManagement::addItemToCart($produk_id);

        $this->dispatch('update-count-cart', total_count: $total_count)->to(Navbar::class);
    }

    public function render()
    {
        $produks = Produk::where('status', true)->get();
        return view('livewire.produk-page', [
            'produks' => $produks
        ]);
    }
}