<?php

namespace App\Models\member;

use App\Models\entity\EntityLoan;
use App\Models\entity\EntityMember;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberEntityLoan extends Model
{
    use HasFactory;

    protected $fillable = [
        "member_id", // => entity_member_id
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

    public function member()
    {
        return $this->belongsTo(EntityMember::class, 'member_id');
    }

    public function loan()
    {
        return $this->belongsTo(EntityLoan::class, 'entity_loan_id');
    }

    public function request()
    {
        return $this->belongsTo(MemberEntityLoanRequest::class);
    }
}
