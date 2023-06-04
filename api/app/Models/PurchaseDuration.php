<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDuration extends Model
{
    use HasFactory;

    protected $fillable = [
        "in_months",
        "label",
    ];
}
