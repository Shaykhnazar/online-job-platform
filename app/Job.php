<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;

class Job extends Model
{
    //
    protected $primaryKey = 'job_id';

    /**
     * @var string[]
     */
    public static $EXPERIENCE_LEVEL = [
        'entry' => 'Entry',
        'middle' => 'Middle',
        'senior' => 'Senior'
    ];

    /**
     * @var string[]
     */
    public static $TYPE = [
        'Internship' => 'Internship',
        'Contractual' => 'Contractual',
        'Part-time' => 'Part-time',
        'Full-time' => 'Full-time'
    ];

    /**
     * @return HasOne
     */
    public function company(): HasOne
    {
        return $this->hasOne(Employeer::class,'id','employeer_id');
    }

    /**
     * @return BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class,'region_id','id');
    }

    /**
     * @return HasMany
     */
    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class,'skill_id','job_id');
    }

    /**
     * Scope filter
     *
     * @param Builder $query
     * @param array $filters
     * @return Builder
     */
    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query->when($filters['category'] ?? null, function (Builder $query, string $category) {
            return $query->where('category', '=', $category);
        })->when($filters['experience'] ?? null, function (Builder $query, string $experience) {
            return $query->where('experience', '=', $experience);
        })->when($filters['job_type'] ?? null, function (Builder $query, string $job_type) {
            return $query->where('employment_type', '=', $job_type);
        })->when($filters['region_id'] ?? null, function (Builder $query, string $region_id) {
            return $query->where('region_id', '=', $region_id);
        })->when($filters['employeer_id'] ?? null, function (Builder $query, string $employeer_id) {
            return $query->where('employeer_id', '=', $employeer_id);
        })->when($filters['skill_id'] ?? null, function (Builder $query, string $skill_id) {
            return $query->orWhereHas('skills',function(Builder $query) use ($skill_id){
                return $query->where('id','=', $skill_id);
            });
        })->when($filters['search'] ?? null, function (Builder $query, $search) {
            return $query->where('title','like',"%".$search."%")
                ->orWhere('experience','like',"%".$search."%")
                ->orWhere('salary','like',"%".$search."%")
                ->orWhereHas('company',function(Builder $query) use ($search){
                    return $query->where('name','like',"%".$search."%");
                })
                ->orWhereHas('region',function(Builder $query) use ($search){
                    return $query->where('name','like',"%".$search."%");
                });
        });
    }

    /**
     * @param Builder $query
     * @return int
     */
    public static function scopeLastWeekJobsCount(Builder $query): int
    {
        return $query->where('created_at','>=', \Carbon\Carbon::today()->subDays(7))->count();
    }
}
