<?php

namespace App\Livewire;

use Livewire\Component;
use App\Factories\CartFactory;

class Cart extends Component
{

    public function getCartProperty()
    {
        return CartFactory::make()->loadMissing(['items', 'items.product', 'items.variant']);
    }

    public function delete($itemId)
    {
        $this->cart->items()->where('id', $itemId)->delete();

        $this->dispatch('productRemovedFromCart');
    }

    public function getItemsProperty()
    {
        return $this->cart->items;
    }

    public function increment($itemId)
    {
        $item = $this->cart->items()->find($itemId);

        if ($item) {
            $item->increment('quantity');
            $item->refresh();

            $this->dispatch('incrementQuantity');
        }

        $this->cart = $this->cart->fresh();
    }

    public function decrement($itemId)
    {
        $item = $this->cart->items()->find($itemId);

        if ($item && $item->quantity > 1) {
            $item->decrement('quantity');
            $item->refresh();

            $this->dispatch('decrementQuantity');
        }
        $this->cart = $this->cart->fresh();
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
