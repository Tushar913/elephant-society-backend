<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asset extends Model
{
    use Searchable;

    protected $fillable = [
        "name",
        "cost",
        "asset_type",
        "depreciation_percent",
        "society_id",
        "wing_id",
    ];

    protected array $searchableFields = ["name", "asset_type", "society.name", "wing.wing_name"];


    public function society(): BelongsTo {
        return $this->belongsTo(Society::class);
    }

    public function wing(): BelongsTo {
        return $this->belongsTo(Wing::class);
    }

    public function owner(): BelongsTo {
        return $this->belongsTo(Owner::class);
    }
}
