<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CheckoutPage extends Component
{
    public $my_cart;
    public $subtotal;
    public $payment = false;
    public $estimateTax;
    public $grandtotal;
    public $snapToken;

    public $email, $nama, $alamat, $apartment, $provinsi, $kota, $postal, $phone;


    public function mount()
    {
        $this->my_cart = CartManagement::getCartItemCookie();
        if (count($this->my_cart) == 0 || !$this->my_cart) {
            return redirect()->route('home');
        }
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
            'phone' => 'required|numeric|max_digits:15',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus valid',
            'email.max' => 'Email maksimal 200 karakter',
            'nama.required' => 'Nama harus diisi',
            'nama.max' => 'Nama maksimal 200 karakter',
            'alamat.required' => 'Alamat harus diisi',
            'apartment.required' => 'Apartment harus diisi',
            'kota.required' => 'Kota harus diisi',
            'provinsi.required' => 'Provinsi harus diisi',
            'postal.required' => 'Kode Pos harus diisi',
            'postal.numeric' => 'Kode Pos harus berupa angka',
            'phone.required' => 'Nomor Telepon harus diisi',
            'phone.numeric' => 'Nomor Telepon harus berupa angka',
            'phone.max_digits' => 'Nomor Telepon maksimal 15 karakter',
        ]);

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        try {
            DB::beginTransaction();
            // cek stock
            foreach ($this->my_cart as $key => $item) {
                $product = Produk::find($item['id']);
                if ($product->stok < $item['qty']) {
                    $this->addError('my_cart.' . $key . '.quantity', 'Stok tidak mencukupi');
                    return false;
                }
            }
            // decrease sortKeysUsing
            foreach ($this->my_cart as $key => $item) {
                $product = Produk::find($item['id']);
                $product->stok -= $item['qty'];
                if ($product->stok == 0) {
                    $product->status = false;
                }
                $product->save();
            }
            // Insert into order
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->status = 'pending';
            $order->payment_status = 'pending';
            $order->subtotal = $this->subtotal;
            $order->tax = $this->estimateTax();
            $order->grandtotal = $this->grandtotal;
            $order->save();
            // Insert customer address
            $customer = new CustomerAddress();
            $customer->create([
                'order_id' => $order->id,
                'nama' => $this->nama,
                'email' => $this->email,
                'no_telp' => $this->phone,
                'alamat' => $this->alamat,
                'rumah' => $this->apartment,
                'kota' => $this->kota,
                'provinsi' => $this->provinsi,
                'kode_pos' => $this->postal,
            ]);

            // insert order item
            foreach ($this->my_cart as $key => $item) {
                $order->items()->create([
                    'produk_id' => $item['id'],
                    'qty' => $item['qty'],
                    'harga' => $item['harga'],
                    'total' => $item['subtotal'],
                ]);
            }

            CartManagement::clearItemFromCookie();

            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => round($this->grandtotal),
                ),
                'customer_details' => array(
                    'first_name' => 'Saudara...',
                    'last_name' => $this->nama,
                    'email' => $this->email,
                    'phone' => $this->phone,
                ),
            );

            DB::commit();

            $this->snapToken = \Midtrans\Snap::getSnapToken($params);
            session(['snap_token' => $this->snapToken]);
            session(['order_id' => $order->id]);

            return redirect()->route('payment');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->addError('my_cart', $e->getMessage());
            return false;
        }
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