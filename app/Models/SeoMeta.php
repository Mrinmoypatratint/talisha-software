<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_slug',
        'title',
        'description',
        'keywords',
        'og_image',
        'canonical_url',
        'robots',
        'structured_data',
    ];

    protected $casts = [
        'structured_data' => 'array',
    ];
}
