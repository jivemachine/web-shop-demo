<?php

namespace App\Livewire;

use Livewire\Component;
use App\Factories\CartFactory;

class Cart extends Component
{

    public function delete($itemId)
    {
        CartFactory::make()->items()->where('id', $itemId)->delete();

        $this->dispatch('productRemovedFromCart');
    }

    public function getItemsProperty()
    {
        return CartFactory::make()->items;
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
