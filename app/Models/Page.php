<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'slug', 'type',
        'title_en', 'title_km',
        'subtitle_en', 'subtitle_km',
        'content_en', 'content_km',
        'featured_image',
        'meta_title', 'meta_description', 'meta_keywords',
        'is_active',
    ];
}
