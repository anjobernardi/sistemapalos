<?php

namespace App\Models;

use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Part extends Model
{
    use HasFactory, Multitenantable;

    protected $fillable = [
        'equipment_id',
        'description',
        'period',
        'active',
        'created_by_company_id'
    ];

    public function service_order(): BelongsToMany
    {
        return $this->belongsToMany(ServiceOrder::class,);
    }

    public function plans(): HasMany
    {
        return $this->hasMany(Plan::class, 'part_id', 'id');
    }
}
