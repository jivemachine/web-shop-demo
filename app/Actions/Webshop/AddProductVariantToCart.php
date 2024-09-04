<?php

namespace App\Actions\Webshop;

use App\Factories\CartFactory;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AddProductVariantToCart
{
    public function add($variantId)
    {
        CartFactory::make()->items()->create([
            'product_variant_id' => $variantId,
            'quantity' => 1,
        ]);
    }
}
