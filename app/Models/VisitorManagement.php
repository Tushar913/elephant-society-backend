<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorManagement extends Model
{
    protected $fillable = [
        'visitor_name',
        'purpose',
        'visit_date',
        'visit_time',
        'profile',
        'status'
    ];

}
