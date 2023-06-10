<?php

namespace App\Http\Resources\entity;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class EntityMemberContributionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $date_time = new Carbon($this->created_at);
        $member = new EntityMembersResource($this->member);
        // return parent::toArray($request);

        // entity_member_id
        // entity_contribution_id
        // transaction_code
        // contribution_period

        return [
            
            "id" => $this->id,
            "contribution_id"=>$this->entity_contribution_id,
            "amount" => $this->amount,
            "member" => $member,
            "period" => $this->contribution_period,
            "payment_date" => $date_time->format('h:mA j/m/Y'),
            "transaction_code" => $this->transaction_code,
        ];
    }
}
