<?php

namespace App\Models\member;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberEntityLoanRepayment extends Model
{
    use HasFactory;

    protected $fillable = [
        "member_entity_loan_id",
        "payment_period",
        "amount_paid",
        "transaction_code",
        "received_date",
    ];
}
