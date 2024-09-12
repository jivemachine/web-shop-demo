<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public $casts = [
        'billing_addess' => 'collection',
        'shipping_addess' => 'collection',
    ];

    public function items(): HasMany
    {
        return $this->HasMany(OrderItem::class);
    }
}
