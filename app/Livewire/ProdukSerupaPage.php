<?php

namespace App\Livewire;

use App\Models\Produk;
use Livewire\Component;

class ProdukSerupaPage extends Component
{
    public $produk;

    public function placeholder()
    {
        return view('placeholders.produk-serupa');
    }

    public function mount($produk = null)
    {
        $this->produk = $produk;
    }

    public function render()
    {
        if (is_null($this->produk)) {
            $produks = Produk::inRandomOrder()->limit(8)->get();
        } else {
            $produks = Produk::whereNot('id', $this->produk)->limit(8)->get();
        }
        // If produk length > 0 return view
        if (count($produks) > 0) {
            return view('livewire.produk-serupa-page', [
                'produks' => $produks
            ]);
        } else {
            return <<<'HTML'
            <div>
            </div>
            HTML;
        }
    }
}