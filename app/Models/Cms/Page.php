<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = [
        'slug',
        'type',
        'title_en',
        'title_km',
        'subtitle_en',
        'subtitle_km',
        'content_en',
        'content_km',
        'featured_image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
