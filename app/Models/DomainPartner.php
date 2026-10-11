<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainPartner extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain_config_id',
        'logo_path',
        'name',
        'sort_order',
    ];

    public function domainConfig()
    {
        return $this->belongsTo(DomainConfig::class, 'domain_config_id');
    }
}
