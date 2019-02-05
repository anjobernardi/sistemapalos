<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    protected $table = 'serviceorders';

    protected $fillable = [
        'maintenance',
        'status',
        'opening',
        'closing',
        'opening_date',
        'closing_date',
        'description',
        'observations',
        'mechanical_team',
        'electrical_team',
        'equipment_id',
        'user_id',
    ];

    /**
     * Relationships
     */

    /**
     * The hasMany relationship to Equipments
     *
     * @return hasMany
     */
    public function Equipments()
    {
        return $this->hasMany(Equipment::class);
    }
}
