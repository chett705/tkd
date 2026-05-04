<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    protected $fillable = [
        'page', 'section_key',
        'title_en', 'title_km',
        'subtitle_en', 'subtitle_km',
        'description_en', 'description_km',
        'button_text_en', 'button_text_km',
        'button2_text_en', 'button2_text_km',
        'button_link_en', 'button_link_km',
        'button2_link_en', 'button2_link_km',
        'media_type', 'media_url',
        'sort_order', 'is_active',
    ];
}
