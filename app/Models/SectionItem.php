<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionItem extends Model
{
    protected $fillable = [
        'section_key', 'component_type', 'group_title', 'page',
        'title_en', 'title_km',
        'description_en', 'description_km',
        'image', 'icon', 'link',
        'button_text_en', 'button_text_km',
        'sort_order', 'is_active', 'type', 'meta',
    ];

    protected $casts = ['meta' => 'array'];
}
