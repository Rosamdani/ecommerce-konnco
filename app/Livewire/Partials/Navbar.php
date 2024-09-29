<?php

namespace App\Livewire\Partials;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
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
