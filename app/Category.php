<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $primaryKey = 'category_id';

    public function scopeFeatured(Builder $query)
    {
        return $query->where('featured', true);
    }
}
