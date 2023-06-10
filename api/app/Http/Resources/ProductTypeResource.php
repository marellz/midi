<?php

namespace App\Http\Resources;

use App\Models\PurchaseType;
use App\Models\Sector;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductTypeResource extends JsonResource
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

        $sector = Sector::findOrFail($this->sector_id);
        $pt = PurchaseType::findOrFail($this->purchase_type_id);

        return [
            "id"=> $this->id,
            "name"=> $this->name,
            "sector" => new SectorResource($sector),
            "purchase_type" => new PurchaseTypeResource($pt),
        ];
    }
}
