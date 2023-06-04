<?php

namespace App\Models\entity;

use App\Models\member\MemberEntityLoan;
use App\Models\member\MemberEntityLoanRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityLoan extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "entity_id",
        "details",
        "purchase_duration_id",
        "min_amount",
        "max_amount",
        "rate_pa",
    ];


    public function requests()
    {
        return $this->hasMany(MemberEntityLoanRequest::class);
    }

    public function active()
    {
        return $this->hasMany(MemberEntityLoan::class);
    }
}
