<?php

namespace App\Models\entity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityMemberContribution extends Model
{
    use HasFactory;

    protected $fillable = [
        "entity_member_id",
        "entity_contribution_id",
        "amount",
        "phone",
        "transaction_code",
        "contribution_period",
    ];


    // entity_contribution
    // member

    public function member()
    {
        return $this->belongsTo(EntityMember::class, 'entity_member_id');
    }
}
