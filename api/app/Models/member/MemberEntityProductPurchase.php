<?php

namespace App\Models\member;

use App\Models\entity\EntityMember;
use App\Models\entity\EntityProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberEntityProductPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        "member_id", // todo: entity_member_id
        "entity_product_id",

        #todo: add
        // "transaction_code",
        // "phone",
        // "payment_date",
        // "amount",
        
        "start_date",
        "end_date",
    ];

    public function member()
    {
        return $this->belongsTo(EntityMember::class, 'member_id');
    }

    public function product()
    {
        return $this->belongsTo(EntityProduct::class, 'entity_product_id');
    }
}
