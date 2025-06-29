<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    // Allow mass assignment
    protected $guarded = [];

    // Cast booleans and dates properly
    protected $casts = [
        'hired_date' => 'date',
        'dob' => 'date',

        'is_1099' => 'boolean',
        'family' => 'boolean',
        'car' => 'boolean',

        'tuesday_vci' => 'boolean',
        'wednesday_vci' => 'boolean',
        'thursday_vci' => 'boolean',
        'friday_vci' => 'boolean',
        'saturday_vci' => 'boolean',
        'sunday_vci' => 'boolean',
        'monday_vci' => 'boolean',
    ];
}
