<?php

namespace App\Http\Resources\entity;

use App\Models\entity\EntityMember;
use Illuminate\Http\Resources\Json\JsonResource;

class EntityMemberProductPurchaseResource extends JsonResource
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

        // $member = EntityMember::findOrFail($this->member_id);
        $member = $this->member;
        $product = $this->product;

        return [
            "id" => $this->id,
            "member" => new EntityMembersResource($member),
            "product" => [
                "id"=> $product->id,
                "name"=> $product->name,
            ],
            "start_date" => $this->start_date,
            "end_date" => $this->end_date,
        ];
    }
}
