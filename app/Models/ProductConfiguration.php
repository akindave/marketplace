<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductConfiguration extends Model
{
    use HasFactory;
    public function variation_options(){
        return $this->belongsTo(VariationOption::class,'variation_option_id')
        ->with(['variation']);
    }
}
