<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class SectionItem extends Model
{
      protected $table = 'section_items';

    protected $fillable = [
        'section_key',
        'component_type',
        'group_title',
        'page',
        'title_en',
        'title_km',
        'description_en',
        'description_km',
        'image',
        'images',
        'icon',
        'link',
        'button_text_en',
        'button_text_km',
        'sort_order',
        'is_active',
        'type',
        'meta',
        'decription'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'meta'      => 'array',
         'images' => 'array',
    ];

    /*
    |----------------------------------------
    | RELATIONSHIPS
    |----------------------------------------
    */

    public function pageSection()
    {
        return $this->belongsTo(PageSection::class, 'section_key', 'section_key');
    }
}
