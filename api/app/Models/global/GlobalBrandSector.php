<?php

namespace App\Models\global;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalBrandSector extends Model
{
    use HasFactory;

    protected $fillable = [
        "global_brand_id",
        "sector_id"
    ];
}
