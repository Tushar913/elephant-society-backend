<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wing extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        "wing_name",
        "no_floors",
        "no_flats",
        "no_lifts",
        "fire_extinguisher_date",
        "society_id",
    ];

    protected array $searchableFields = ["wing_name", "society.name"];

    public function society(): BelongsTo {
        return $this->belongsTo(Society::class);
    }

    public function owners(): HasMany {
        return $this->hasMany(Owner::class);
    }
}
