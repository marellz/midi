<?php

namespace App\Models\entity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityContribution extends Model
{
    use HasFactory;

    // this is a "Fund"
    // EntityMemberContribution is a members contribution to that "fund"

    protected $fillable = [
        "entity_id",
        "name",
        "info",
        "amount",
        "payment_frequency_id",
    ];

    public function memberContributions()
    {
        return $this->hasMany(EntityMemberContribution::class);
    }


    // entity
}
