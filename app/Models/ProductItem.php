<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    use HasFactory;

    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function product_configuration(){
        return $this->hasMany(ProductConfiguration::class,'product_item_id');
    }
}
