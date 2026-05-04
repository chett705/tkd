<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    protected $table = 'page_sections';

    protected $fillable = [
        'page',
        'section_key',
        'title_en',
        'title_km',
        'subtitle_en',
        'subtitle_km',
        'description_en',
        'description_km',
        'button_text_en',
        'button_text_km',
        'button_link_en',
        'button_link_km',
        'media_type',
        'media_url',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /*
    |----------------------------------------
    | RELATIONSHIP
    |----------------------------------------
    */

    public function page()
    {
        return $this->belongsTo(Page::class, 'page', 'slug');
    }

    public function items()
    {
        return $this->hasMany(SectionItem::class, 'section_key', 'section_key');
    }
}
