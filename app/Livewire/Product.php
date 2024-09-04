<?php

namespace App\Livewire;

use Livewire\Component;
use App\Actions\Webshop\AddProductVariantToCart;

class Product extends Component
{
    public $productId;

    public $variant;

    public $rules = [
        'variant' => ['required', 'exists:App\Models\ProductVariant,id']
    ];

    public function mount($productId)
    {
        $this->variant = $this->product->variants()->value('id');
    }

    public function addToCart(AddProductVariantToCart $cart)
    {
        $this->validate();

        $cart->add(
            variantId: $this->variant
        );


    }

    public function getProductProperty()
    {
        return \App\Models\Product::findOrfail($this->productId);
    }

    public function render()
    {
        return view('livewire.product');
    }
}
