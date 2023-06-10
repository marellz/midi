<?php

namespace App\Http\Resources\entity;

use App\Http\Resources\PurchaseDurationResource;
use App\Models\PurchaseDuration;
use Illuminate\Http\Resources\Json\JsonResource;

class EntityLoanResource extends JsonResource
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
        $pd = PurchaseDuration::findOrFail($this->purchase_duration_id);
        return [
            "id"=> $this->id,
            "name" => $this->name,
            "entity" => [
                "id" => $this->entity->id,
                "name" => $this->entity->name,
            ],
            "details" => $this->details,
            "purchase_duration" => new PurchaseDurationResource($pd),
            "min_amount" => $this->min_amount,
            "max_amount" => $this->max_amount,
            "rate_pa" => $this->rate_pa,
        ];
    }
}
