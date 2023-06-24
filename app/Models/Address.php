<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'unit_number',
        'street_number',
        'address_line1',
        'address_line2',
        'state_id',
        'country_id'
    ];
}
