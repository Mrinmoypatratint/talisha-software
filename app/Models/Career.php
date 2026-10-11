<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Career extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'department',
        'location',
        'employment_type',
        'short_description',
        'full_description',
        'requirements',
        'benefits',
        'salary_range',
        'is_active',
        'is_featured',
        'expires_at',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'expires_at' => 'datetime',
    ];

    public function applications()
    {
        return $this->hasMany(CareerApplication::class, 'career_id');
    }
}
