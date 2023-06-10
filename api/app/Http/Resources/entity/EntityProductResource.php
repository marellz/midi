<?php

namespace App\Http\Resources\entity;

use App\Http\Resources\PaymentFrequencyResource;
use App\Http\Resources\ProductTypeResource;
use App\Models\PaymentFrequency;
use App\Models\ProductType;
use Illuminate\Http\Resources\Json\JsonResource;

class EntityProductResource extends JsonResource
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
        $pt = ProductType::findOrFail($this->product_type_id);
        $pf = PaymentFrequency::find($this->payment_frequency_id);

        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "price" => $this->price,
            "type" => new ProductTypeResource($pt),
            "payment_frequency" => new PaymentFrequencyResource($pf),
        ];
    }
}
