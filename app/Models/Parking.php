<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Parking extends Model
{
    use Searchable;

    protected $fillable = [
        'vehicle_no',
        'vehicle_name',
        'vehicle_type',
        'slot_no',
        'is_billable',
    ];

    protected array $searchableFields = ["vehicle_name", "vehicle_type", "vehicle_no", "owner.name"];

    public function owner(): BelongsTo {
        return $this->belongsTo(Owner::class);
    }
}
