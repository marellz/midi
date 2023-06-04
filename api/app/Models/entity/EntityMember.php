<?php

namespace App\Models\entity;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityMember extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "entity_id",
        "is_admin",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }
}
