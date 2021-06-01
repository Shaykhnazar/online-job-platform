<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skill extends Model
{

    /**
     * @return BelongsToMany
     */
    public function jobs(): BelongsToMany
    {
        return $this->belongsToMany(Job::class,'job_skills','job_id', 'skill_id');
    }

    public function scopeFeatured(Builder $query)
    {
        return $query->where('featured', true);
    }

}
