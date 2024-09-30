<?php

namespace App\Livewire\Partials;

use App\Helpers\CartManagement;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Navbar extends Component
{
    public $total_count = 0;

    public function mount()
    {
        $this->total_count = count(CartManagement::getCartItemCookie());
    }

    #[On('update-count-cart')]
    public function updateCountCart($total_count)
    {
        $this->total_count = $total_count;
    }

    public function render()
    {
        $isLoggedIn = false;
        if (Auth::check() && Auth::user()->hasRole('user')) {
            $isLoggedIn = true;
        }
        return view('livewire.partials.navbar', [
            'isLoggedIn' => $isLoggedIn
        ]);
    }
}