<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guard extends Model
{
    use Searchable;

    protected $fillable = [
        "name",
        "email",
        "role",
        "phone",
        "gender",
        "society_id",
        "wing_id"
    ];

    protected array $searchableFields = ["name", "email", "society.name", "wing.wing_name"];

    public function society(): BelongsTo {
        return $this->belongsTo(Society::class);
    }

    public function wing(): BelongsTo {
        return $this->belongsTo(Wing::class);
    }
}
