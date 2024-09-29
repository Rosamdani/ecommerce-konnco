<?php

namespace App\Livewire;

use Livewire\Attributes\Lazy;
use Livewire\Component;


#[Lazy]
class ProdukPage extends Component
{

    public function placeholder()
    {
        return view('placeholders.produk-page');
    }

    public function render()
    {
        return view('livewire.produk-page');
    }
}
