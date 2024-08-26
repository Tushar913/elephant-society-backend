<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Complaint extends Model
{
    use Searchable;

    protected $fillable = [
        "name",
        "related_to",
        'description',
        'status',
        'expected_resolution_date',
        'feedback',
        'priority',
        'photo',
        "society_id",
        "wing_id",
        "owner_id",
        "tenant_id",
    ];

    protected array $searchableFields = ["related_to", "society.name", "tenant.name"];

    public function society(): BelongsTo {
        return $this->belongsTo(Society::class);
    }

    public function wing(): BelongsTo {
        return $this->belongsTo(Wing::class);
    }

    public function owner(): BelongsTo {
        return $this->belongsTo(Owner::class);
    }

    public function tenant(): BelongsTo {
        return $this->belongsTo(User::class, "tenant_id");
    }
}
