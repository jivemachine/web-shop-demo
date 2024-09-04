<?php

namespace App\Livewire;

use Livewire\Component;
use App\Actions\Webshop\AddProductVariantToCart;
use Laravel\Jetstream\InteractsWithBanner;

class Product extends Component
{
    use InteractsWithBanner;

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

        $this->banner('You product has been added to your cart.');

        $this->dispatch('productAddedToCart');

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
