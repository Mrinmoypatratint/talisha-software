<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain',
        'heading',
        'stats',
        'is_active',
    ];

    protected $casts = [
        'stats' => 'array',
        'is_active' => 'boolean',
    ];

    public function partners()
    {
        return $this->hasMany(DomainPartner::class, 'domain_config_id')->orderBy('sort_order');
    }
}
