<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['group_name', 'key_name', 'value_en', 'value_km', 'type', 'sort_order', 'is_active'];

    public static function get(string $group, string $key, string $locale = 'en'): ?string
    {
        $col = 'value_' . $locale;

        return static::where('group_name', $group)
            ->where('key_name', $key)
            ->where('is_active', true)
            ->value($col);
    }
}
