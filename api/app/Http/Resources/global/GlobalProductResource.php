<?php

namespace App\Http\Resources\global;

use App\Http\Resources\PaymentFrequencyResource;
use App\Http\Resources\PurchaseDurationResource;
use App\Http\Resources\PurchaseTypeResource;
use App\Http\Resources\SectorResource;
use App\Models\global\GlobalBrand;
use App\Models\PaymentFrequency;
use App\Models\PurchaseDuration;
use App\Models\PurchaseType;
use App\Models\Sector;
use Illuminate\Http\Resources\Json\JsonResource;

class GlobalProductResource extends JsonResource
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

        $pd = PurchaseDuration::find($this->purchase_duration_id);
        $pf = PaymentFrequency::find($this->payment_frequency_id);
        $pt = PurchaseType::find($this->purchase_type_id);
        $sector = Sector::find($this->sector_id);
        $brand = GlobalBrand::find($this->global_brand_id);

        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            // "description",
            "brand" => [
                "name" => $brand->name,
                "id" => $brand->id,
            ],
            // "global_brand_id",
            "purchase_type" => new PurchaseTypeResource($pt),
            // "purchase_type_id",
            "purchase_duration" => new PurchaseDurationResource($pd),
            // "purchase_duration_id",
            "payment_frequency" => new PaymentFrequencyResource($pf),
            // "payment_frequency_id",
            "sector" => new SectorResource($sector),
            // "sector_id",
            // "fee" => $this->fee_max ? $this->fee . ' - '. $this->fee_max : $this->fee,
            "fee" => $this->fee,
            "fee_max" => $this->fee_max,
        ];
    }
}
