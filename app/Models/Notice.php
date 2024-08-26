<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notice extends Model
{
    use Searchable;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'venue',
        'time',
        'remarks',
        'priority',
        'is_event',
        'society_id',
        'wing_id',
    ];

    protected array $searchableFields = ["name", "society.name", "wing.wing_name"];

    public function society(): BelongsTo {
        return $this->belongsTo(Society::class);
    }

    public function wing(): BelongsTo {
        return $this->belongsTo(Wing::class);
    }
}
