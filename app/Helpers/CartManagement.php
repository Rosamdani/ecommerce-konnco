<?php

namespace App\Helpers;

use App\Models\Produk;
use Illuminate\Support\Facades\Cookie;

class CartManagement
{
    public static function addCartItemCookie($item)
    {
        Cookie::queue('cart', json_encode($item), 60 * 24 * 30);
    }

    public static function clearItemFromCookie()
    {
        Cookie::queue(Cookie::forget('cart'));
    }

    public static function getCartItemCookie()
    {
        $my_cart = json_decode(Cookie::get('cart'), true);
        return $my_cart ? $my_cart : [];
    }

    public static function addItemToCart($produk_id)
    {
        $my_cart = self::getCartItemCookie();
        $my_item = null;

        foreach ($my_cart as $key => $item) {
            if ($item['id'] == $produk_id) {
                $my_item = $key;
                break;
            }
        }

        if ($my_item !== null) {
            $my_cart[$my_item]['qty'] += 1;
            $my_cart[$my_item]['subtotal'] = $my_cart[$my_item]['harga'] * $my_cart[$my_item]['qty'];
        } else {
            $produk = Produk::where('id', $produk_id)->first(['id', 'nama', 'harga', 'images']);
            if ($produk) {
                $my_cart[] = [
                    'id' => $produk->id,
                    'nama' => $produk->nama,
                    'harga' => $produk->harga,
                    'images' => $produk->images[0],
                    'qty' => 1,
                    'subtotal' => $produk->harga
                ];
            }
        }

        self::addCartItemCookie($my_cart);
        return count($my_cart);
    }

    // get product quantity from cookie
    public static function getProdukStok($id)
    {
        $cart_items = self::getCartItemCookie();
        foreach ($cart_items as $key => $item) {
            if ($item['id'] == $id) {
                return $item['qty'];
            }
        }
        return 0;
    }

    public static function removeItemFromCart($produk_id)
    {
        $cart_items = self::getCartItemCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['id'] == $produk_id) {
                unset($cart_items[$key]);
                break;
            }
        }

        self::addCartItemCookie($cart_items);

        return $cart_items;
    }

    // Increment
    public static function incrementCartItem($produk_id)
    {
        $cart_items = self::getCartItemCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['id'] == $produk_id) {
                $cart_items[$key]['qty'] += 1;
                $cart_items[$key]['subtotal'] = $cart_items[$key]['harga'] * $cart_items[$key]['qty'];
                break;
            }
        }

        self::addCartItemCookie($cart_items);
        return $cart_items;
    }

    // Decrement
    public static function decrementCartItem($produk_id)
    {
        $cart_items = self::getCartItemCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['id'] == $produk_id) {
                if ($cart_items[$key]['qty'] > 1) {
                    $cart_items[$key]['qty'] -= 1;
                    $cart_items[$key]['subtotal'] = $cart_items[$key]['harga'] * $cart_items[$key]['qty'];
                }
            }
        }

        self::addCartItemCookie($cart_items);
        return $cart_items;
    }

    public static function calculateGrandTotal($items)
    {
        return array_sum(array_column($items, 'subtotal'));
    }
}