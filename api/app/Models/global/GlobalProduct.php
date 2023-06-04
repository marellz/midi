<?php

namespace App\Models\global;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "global_brand_id",
        "description",
        // "product_type_id",
        "purchase_type_id",
        "purchase_duration_id",
        "payment_frequency_id",
        "sector_id",
        "fee",
        "fee_max",
    ];
}
