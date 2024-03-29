<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    use HasFactory;

    protected $table = "spots";
    protected $guarded = ["id"];
    protected $hidden = [
        "created_at", "updated_at"
    ];
}
