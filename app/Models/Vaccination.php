<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    use HasFactory;
    protected $table = "vaccinations";
    protected $guarded = ["id"];
    protected $hidden = [
        "created_at", "updated_at"
    ];

    public function spot()
    {
        return $this->belongsTo(Spot::class, "spot_id");
    }
}
