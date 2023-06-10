<?php

namespace App\Http\Resources\entity;

use Illuminate\Http\Resources\Json\JsonResource;

class EntityMembersResource extends JsonResource
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
        $user = $this->user;

        return [
            "member_id" => $this->id,
            "admin" => !!$this->is_admin,
            //
            // user info
            "user_id" =>  $this->user->id,
            "name" =>  $this->user->name,
            "phone" =>  $this->user->phone,
            "phone_alt" =>  $this->user->phone_alt,
            "email" =>  $this->user->email,
            "email_alt" =>  $this->user->email_alt,

        ];
        // "user_id",
        // "entity_id",
        // "is_admin",
    }
}
