<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regional extends Model
{
    use HasFactory;

    protected $table = "regionals";
    protected $guarded = ["id"];
    protected $hidden = [
        "created_at", "updated_at"
    ];
}
