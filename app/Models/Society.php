<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Society extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        "name",
        "registration_no",
        "address",
        "no_wings",
        "no_car_parks",
        "no_bike_parks",
        "no_shops",
        "gardens",
        "logo",
        "oc",
        "cc",
        "renewal_date",
    ];

    protected array $searchableFields = ["name", "registration_no"];

    public function wings(): HasMany {
        return $this->hasMany(Wing::class);
    }

    public function owners(): HasMany {
        return $this->hasMany(Owner::class);
    }
}
