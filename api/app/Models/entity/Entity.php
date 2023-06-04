<?php

namespace App\Models\entity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "type_id",
        "sector_id",
        "description",
    ];


    public function members()
    {
        return $this->hasMany(EntityMember::class);
    }

    public function contributions()
    {
        return $this->hasMany(EntityContribution::class);
    }

    public function products()
    {
        return $this->hasMany(EntityProduct::class);
    }

    public function loans()
    {
        return $this->hasMany(EntityLoan::class);
    }
}
