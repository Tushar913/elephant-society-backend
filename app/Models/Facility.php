<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Facility extends Model
{
    use Searchable;

    protected $fillable = [
        "name",
        "society_id"
    ];

    protected array $searchableFields = ["name", "society.name"];

    public function society(): BelongsTo {
        return $this->belongsTo(Society::class);
    }

}
