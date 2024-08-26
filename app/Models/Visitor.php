<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        "name",
        "phone_number",
        "arrival_time",
        "leaving_time",
        "photo",
        "wing_name",
        "flat_number",
    ];

}
