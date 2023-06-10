<?php

namespace App\Http\Resources\entity;

use App\Http\Resources\PaymentFrequencyResource;
use App\Models\PaymentFrequency;
use Illuminate\Http\Resources\Json\JsonResource;

class EntityLoanRequestResource extends JsonResource
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
            // "member_id" => $this->member_id,
            "payment_frequency" => new PaymentFrequencyResource($pf),
            "principal_amount" => $this->principal_amount,
            "approved" => !!$this->approved,
        ];
    }
}
