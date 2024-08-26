<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'maintaince_template_id',
        'society_id',
        'wing_id',
        'owner_id',
        'maintainance_cost',
        'property_tax_cost',
        'water_charges',
        'electricity_charges',
        'vehicle_charges',
        'is_paid',
        'payment_mode',
        'invoice_id',
        'bill_month',
        'bill_date',
        'bill_year',
    ];

    protected array $searchableFields = ["owner.name", "society.name", "wing.wing_name"];

    public function society(): BelongsTo {
        return $this->belongsTo(Society::class);
    }

    public function wing(): BelongsTo {
        return $this->belongsTo(Wing::class);
    }

    public function owner(): BelongsTo {
        return $this->belongsTo(Owner::class);
    }

    public function maintainance(): BelongsTo {
        return $this->belongsTo(MaintainceTemplate::class, "maintaince_template_id");
    }
}
