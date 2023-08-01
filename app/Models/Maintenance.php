<?php

namespace App\Models;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Maintenance extends Model
{
    use HasFactory, Multitenantable;

    protected $fillable = [
        'description',
        'created_by_company_id',
    ];


    public function equipment_situation(): HasOne
    {
        return $this->hasOne(EquipmentSituation::class, 'id', 'equipment_situation_id');
    }

    public function status_service_order(): HasOne
    {
        return $this->hasOne(StatusServiceOrder::class, 'id', 'status_service_order_id');
    }

    public function service_order(): HasOne
    {
        return $this->hasOne(ServiceOrder::class);
    }
}
