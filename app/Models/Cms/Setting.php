<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'group_name',
        'key_name',
        'value_en',
        'value_km',
        'type',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function getValue(string $group, string $key, string $locale = 'en'): ?string
    {
        $column = $locale === 'km' ? 'value_km' : 'value_en';

        return static::where('group_name', $group)
            ->where('key_name', $key)
            ->where('is_active', true)
            ->value($column);
    }
}
