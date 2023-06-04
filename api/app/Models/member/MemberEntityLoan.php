<?php

namespace App\Models\member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberEntityLoan extends Model
{
    use HasFactory;

    protected $fillable = [
        "member_id",
        "payment_frequency",
        "entity_loan_id",
        "member_entity_loan_request_id",
        "intervals",
        "per_interval_payment",
        "amount_payable",
        "balance_due",
        "start_date",
        "due_date",
    ];
}
