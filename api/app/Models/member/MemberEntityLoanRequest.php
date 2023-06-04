<?php

namespace App\Models\member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberEntityLoanRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        "member_id",
        "entity_loan_id",
        "payment_frequency_id",
        "principal_amount",
        "approved",
    ];
}
