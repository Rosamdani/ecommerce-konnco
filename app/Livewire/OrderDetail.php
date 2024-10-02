<?php

namespace App\Livewire;

use Livewire\Component;

class OrderDetail extends Component
{
    public $order;
    public function render()
    {
        $this->order = \App\Models\Order::with(['items', 'customer'])->find(session('order_id'));
        if (!$this->order) {
            session()->forget('order_id');
            return abort(404);
        }


        // Update order status
        $this->order->update(['status' => 'proses', 'payment_status' => 'paid']);

        session()->forget('order_id');

        return view('livewire.order-detail');
    }
}