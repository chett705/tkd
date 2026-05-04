<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class MenuGroup extends Model
{
    protected $table = 'menu_groups';

    protected $fillable = [
        'slug',
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

    public function menus()
    {
        return $this->hasMany(Menu::class, 'menu_group_id');
    }
}
