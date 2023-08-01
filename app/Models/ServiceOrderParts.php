<?php

namespace App\Models;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrderParts extends Model
{
    use HasFactory, Multitenantable;

    protected $fillable = [
        'service_order_id',
        'part_id',
        'maintenance_date'
    ];
}
