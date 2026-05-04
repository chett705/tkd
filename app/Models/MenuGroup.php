<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuGroup extends Model
{
    protected $fillable = ['slug', 'name_en', 'name_km', 'sort_order', 'is_active'];

    public function menus()
    {
        return $this->hasMany(Menu::class)->where('is_active', true)->orderBy('sort_order');
    }
}
