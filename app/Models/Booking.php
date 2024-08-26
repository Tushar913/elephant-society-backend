<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use Searchable;

    protected $fillable = [
        'start_datetime',
        'end_datetime',
        'purpose',
        'society_id',
        'facility_id',
        'owner_id',
    ];

    protected array $searchableFields = ["society.name", "facility.name"];

    public function society(): BelongsTo {
        return $this->belongsTo(Society::class);
    }

    public function owner(): BelongsTo {
        return $this->belongsTo(Owner::class);
    }

    public function facility(): BelongsTo {
        return $this->belongsTo(Facility::class);
    }
}
