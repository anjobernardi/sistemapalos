<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Multitenantable {

    protected static function bootMultitenantable()
    {
        
        if (auth()->check()) {

            static::creating(function ($model) {
                $model->created_by_company_id = auth()->user()->company_id;
            });

            static::addGlobalScope('created_by_company_id', function (Builder $builder) {
                $builder->where('created_by_company_id', auth()->user()->company_id);
            });
        }
    }

}