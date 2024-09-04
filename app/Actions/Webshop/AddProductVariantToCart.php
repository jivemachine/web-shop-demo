<?php

namespace App\Actions\Webshop;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AddProductVariantToCart
{
    public function add($variantId)
    {
        if (auth()->guest()) {
            $cart = Cart::firstOrCreate([
                'session_id' => session()->getId(),
            ]);
        }

        if (auth()->user()) {
            $cart = auth()->user()->cart ?: auth()->user()->cart()->create();
        }

        dd($cart);
    }
}
