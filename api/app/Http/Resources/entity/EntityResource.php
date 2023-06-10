<?php

namespace App\Http\Resources\entity;

use App\Http\Resources\SectorResource;
use App\Models\entity\EntityType;
use App\Models\Sector;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class EntityResource extends JsonResource
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
        $et = EntityType::findOrFail($this->entity_type_id);
        $sector = Sector::findOrFail($this->sector_id);
        $created = new Carbon($this->created_at);

        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "type" => [
                "name" => $et->name,
                "id" => $et->id,
            ],
            "sector" => new SectorResource($sector),
            "created" => $created->format('m/Y'),
        ];
    }
}
