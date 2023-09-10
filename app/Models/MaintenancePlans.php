<?php

namespace App\Models;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenancePlans extends Model
{
    use HasFactory, Multitenantable;

    protected $fillable = [
        'equipment_id',
        'part_id',
        'activity',
        'active',
        'created_by_company_id'
    ];
}
