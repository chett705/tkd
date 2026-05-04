<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['menu_group_id', 'slug', 'route', 'sort_order', 'is_active', 'name_en', 'name_km'];

    public function group()
    {
        return $this->belongsTo(MenuGroup::class, 'menu_group_id');
    }
}
