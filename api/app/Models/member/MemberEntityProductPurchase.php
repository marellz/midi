<?php

namespace App\Models\member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberEntityProductPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        "member_id",
        "entity_product_id",
        "start_date",
        "end_date",
    ];
}
