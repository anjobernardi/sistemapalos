<?php

namespace App\Models;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EquipmentSituation extends Model
{
    use HasFactory, Multitenantable;

    protected $fillable = [
        'description',
        'created_by_company_id',
    ];

    
    public function service_order(): HasOne
    {
        return $this->hasOne(ServiceOrder::class);
    }
}
