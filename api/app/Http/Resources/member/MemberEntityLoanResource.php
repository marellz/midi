<?php

namespace App\Http\Resources\member;

use App\Http\Resources\entity\EntityMembersResource;
use App\Http\Resources\PaymentFrequencyResource;
use App\Models\PaymentFrequency;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberEntityLoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        $pf = PaymentFrequency::findOrFail($this->payment_frequency_id);
        return [
            "id" => $this->id,
            "member" => new EntityMembersResource($this->member),
            "payment_frequency" => new PaymentFrequencyResource($pf),
            "entity_loan" => [
                "id" => $this->loan->id,
                "name" => $this->loan->name,
            ],
            "loan_request" => $this->request,
            "intervals" => $this->intervals,
            "per_interval_payment" => $this->per_interval_payment,
            "amount_payable" => $this->amount_payable,
            "balance_due" => $this->balance_due,
            "start_date" => $this->start_date,
            "due_date" => $this->due_date,
        ];
    }
}
