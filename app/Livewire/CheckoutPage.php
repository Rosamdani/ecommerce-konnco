<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Models\Produk;
use Livewire\Component;

class CheckoutPage extends Component
{
    public $my_cart;
    public $subtotal;
    public $estimateTax;
    public $grandtotal;

    public $email, $nama, $alamat, $apartment, $provinsi, $kota, $postal, $phone;


    public function mount()
    {
        $this->my_cart = CartManagement::getCartItemCookie();
        $this->subtotal = CartManagement::calculateGrandTotal($this->my_cart);
        $this->estimateTotal();
    }

    public function save()
    {
        $this->validate([
            'email' => 'required|email|max:200',
            'nama' => 'required|max:200',
            'alamat' => 'required',
            'apartment' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'postal' => 'required|numeric',
            'phone' => 'required|numeric|max:15',
        ], []);
    }

    public function estimateTax()
    {
        $this->estimateTax = $this->subtotal * 0.03;
        return $this->estimateTax;
    }


    // estimate total
    public function estimateTotal()
    {
        $this->grandtotal = $this->subtotal + $this->estimateTax();
    }


    public function render()
    {
        return view('livewire.checkout-page');
    }
}
