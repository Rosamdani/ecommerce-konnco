<?php

namespace App\Http\Controllers;

use App\Helpers\CartManagement;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public $my_cart;
    public $subtotal;
    public $estimateTax;
    public $grandtotal;
    public $snapToken;

    public function index()
    {
        // Get snaptoken from session
        $this->snapToken = session('snap_token');
        return view('pages.payment', [
            'snapToken' => $this->snapToken
        ]);
    }
}
