<?php

namespace App\Livewire;

use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class ProdukDetailPage extends Component
{
    public function placeholder()
    {
        return view('placeholders.produk-detail');
    }
    public function render()
    {
        return view('livewire.produk-detail-page');
    }
}
