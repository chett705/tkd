<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = [
        'menu_group_id',
        'slug',
        'route',
        'sort_order',
        'is_active',
        'name_en',
        'name_km',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /*
    |----------------------------------------
    | RELATIONSHIP
    |----------------------------------------
    */

    public function group()
    {
        return $this->belongsTo(MenuGroup::class, 'menu_group_id');
    }
}
