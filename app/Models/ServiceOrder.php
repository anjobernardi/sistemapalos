<?php

namespace App\Models;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServiceOrder extends Model
{
    use HasFactory, Multitenantable;

    protected $fillable = [
        'maintenance_id',
        'status_service_order_id',
        'equipment_situation_id',
        'equipment_id',
        'opening_user',
        'closing_user',
        'value_labor',
        'value_parts',
        'third_part_service',
        'observation',
        'description',
        'electrical_team',
        'mechanical_team',
        'created_by_company_id',
        'closed',
        'number_so',
        'started_at',
        'ended_at',
        'user_id'
    ];

    public function equipment(): HasOne
    {
        return $this->hasOne(Equipment::class, 'id', 'equipment_id')->with('parts');
    }

    public function equipment_situation(): HasOne
    {
        return $this->hasOne(EquipmentSituation::class, 'id', 'equipment_situation_id');
    }

    public function status_service_order(): HasOne
    {
        return $this->hasOne(StatusServiceOrder::class, 'id', 'status_service_order_id');
    }

    public function maintenance(): HasOne
    {
        return $this->hasOne(Maintenance::class, 'id', 'maintenance_id');
    }

    public function open_user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'opening_user');
    }

    public function close_user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'closing_user');
    }

    public function parts(): BelongsToMany
    {
        return $this->belongsToMany(Part::class,);
    }

    public function partsData(): BelongsToMany
    {
        return $this->belongsToMany(Part::class,);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


}
