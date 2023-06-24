<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    public function product_items()
    {
        return $this->hasMany(ProductItem::class);
    }

    public function variation(){
        return $this->belongsTo(Variation::class);
    }

    public function product_items_count($id){
        // \App\Models\Product
    }

    public function product_category(){
        return $this->belongsTo(ProductCategory::class,'category_id','id');
    }




}
