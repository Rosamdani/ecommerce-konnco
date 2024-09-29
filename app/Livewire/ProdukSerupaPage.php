<?php

namespace App\Livewire;

use Livewire\Component;

class ProdukSerupaPage extends Component
{
    public function placeholder()
    {
        return view('placeholders.produk-serupa');
    }
    public function render()
    {
        return view('livewire.produk-serupa-page');
    }
}
