<?php

namespace App\Http\Resources\entity;

use App\Http\Resources\PaymentFrequencyResource;
use App\Models\entity\Entity;
use App\Models\PaymentFrequency;
use Illuminate\Http\Resources\Json\JsonResource;

class EntityContributionResource extends JsonResource
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
        $entity = Entity::findOrFail($this->entity_id);

        return [
            "id" => $this->id,
            "entity"=> [
                "id"=> $entity->id,
                "name"=> $entity->name,
            ],
            "name"=>$this->name,
            "info"=>$this->info,
            "amount"=>$this->amount,
            
            "payment_frequency"=> new PaymentFrequencyResource($pf),
        ];
    }
}
