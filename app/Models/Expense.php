<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    use Searchable;

    protected $fillable = [
        "name",
        "type",
        "photo",
        "amount",
        "status",
        "payment_mode",
        "is_paid",
        "society_id",
        "wing_id",
        "commitie_id"
    ];

    protected array $searchableFields = [
        "name", "society.name", "wing.wing_name",
    ];

    public function society(): BelongsTo {
        return $this->belongsTo(Society::class);
    }

    public function wing(): BelongsTo {
        return $this->belongsTo(Wing::class);
    }
}
