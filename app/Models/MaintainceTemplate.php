<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaintainceTemplate extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        "per_sqrft_maintaince_cost",
        "per_sqrft_property_tax",
        "water_charges",
        "per_two_wheeler_charges",
        "per_four_wheeler_charges",
        "repair_fund",
        "event_fund",
        "billed_date",
        "due_day",
        "society_id",
    ];

    protected array $searchableFields = ["society.name"];

    public function society(): BelongsTo {
        return $this->belongsTo(Society::class);
    }
}
