<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Owner extends Model
{
    use HasFactory, Notifiable, Searchable;

    protected $fillable = [
        "name",
        "email",
        "phone",
        "flat_no",
        "adhaar",
        "pan",
        "agreement",
        "photo",
        "flat_sqrft",
        "other_docs",
        "society_id",
        "wing_id",
    ];

    // for search local query scope
    protected array $searchableFields = ["name", "society.name", "wing.wing_name"];

    protected $perPage = 10;

    public function users(): HasMany {
        return $this->hasMany(User::class);
    }

    public function society(): BelongsTo {
        return $this->belongsTo(Society::class);
    }

    public function wing(): BelongsTo {
        return $this->belongsTo(Wing::class);
    }

    public function parkings(): HasMany {
        return $this->hasMany(Parking::class);
    }

    public function invoices(): HasMany {
        return $this->hasMany(Invoice::class);
    }

}


