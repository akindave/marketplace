<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'qty',
        'user_id',
        'product_item_id',
    ];

    // protected function created_at(): Attribute
    // {
    //     return Attribute::make(
    //         set: fn (string $value) => \Carbon::now(),
    //         get: fn (date $value) => \Carbon::now()
    //     );
    // }
    // protected function update_at(): Attribute
    // {
    //     return Attribute::make(
    //         set: fn (string $value) => \Carbon::now(),
    //         get: fn (date $value) => \Carbon::now()
    //     );
    // }
}
