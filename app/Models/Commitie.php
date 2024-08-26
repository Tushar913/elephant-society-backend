<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commitie extends Model
{
    use Searchable;

    protected $fillable = [
        "role",
        "appointment_date",
        "tenure_date",
        "society_id",
        "wing_id",
        "owner_id"
    ];

    protected array $searchableFields = [
        "society.name", "wing.wing_name", "owner.name"
    ];

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
