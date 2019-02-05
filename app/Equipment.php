<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipments';

    protected $fillable = [
        'identification',
        'serial_number',
        'description',
        'position',
        'preventive',
        'predictive',
        'active',
    ];
}