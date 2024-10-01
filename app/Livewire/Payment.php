<?php

namespace App\Livewire;

use Livewire\Component;

class Payment extends Component
{
    public $snapToken;

    public function render()
    {
        // Get snaptoken from session
        $this->snapToken = session('snap_token');
        // Delete session
        session()->forget('snap_token');
        return view('livewire.payment', [
            'snapToken' => $this->snapToken
        ]);
    }
}
