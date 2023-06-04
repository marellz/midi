<?php

namespace App\Models\entity;

use App\Models\member\MemberEntityProductPurchase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "price",
        "entity_id",
        "product_type_id",
        "payment_frequency_id",
    ];

    public function memberPurchases()
    {
        return $this->hasMany(MemberEntityProductPurchase::class);
    }
}
