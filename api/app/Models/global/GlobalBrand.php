<?php

namespace App\Models\global;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalBrand extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'location',
        'about',
        'logo',
    ];

    public function sectors()
    {
        return $this->hasMany(GlobalBrandSector::class);
    }

    public function products()
    {
        return $this->hasMany(GlobalProduct::class);
    }
}
