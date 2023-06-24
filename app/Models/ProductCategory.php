<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductCategory extends Model
{
    use HasFactory;

    public function products(): HasOne
    {
        return $this->hasOne(Product::class,'category_id');
    }

    // protected function slug(): Attribute
    // {
    //     return Attribute::make(
    //         set: fn (string $value) => Str::slug($value, '-'),
    //     );
    // }
}
