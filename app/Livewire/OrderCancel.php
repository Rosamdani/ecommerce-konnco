<?php

namespace App\Livewire;

use Livewire\Component;

class OrderCancel extends Component
{
    public $order_id;
    public $order;
    public function mount()
    {

        // get session order id
        $this->order_id = session('order_id');
        if (!isset($this->order_id)) {
            return abort(404);
        }
        // delete session
        session()->forget('order_id');
        // update order status to dibatalkan
        $this->order = \App\Models\Order::find($this->order_id);
        $this->order->update(['status' => 'dibatalkan']);
        // Kembalikan stok produk dari order items
        foreach ($this->order->items as $item) {
            $item->update(['stock' => $item->stok + $item->qty]);
        }
    }

    public function render()
    {
        session()->forget('snap_token');
        return view('livewire.order-cancel');
    }
}