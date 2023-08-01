<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipment extends Model
{
    use HasFactory, Multitenantable;

    protected $fillable = [
        'identification',
        'qrcode',
        'manufacturer',
        'model',
        'specification',
        'location',
        'predictive',
        'active',
        'created_by_company_id',
    ];

    public function parts(): HasMany
    {
        return $this->hasMany(Part::class, 'equipment_id', 'id')->where('active', '=', 1);
    }
}
