<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaFile extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'file_name', 'file_path',
        'file_type', 'mime_type',
        'file_size', 'width', 'height', 'duration',
        'uploaded_at',
    ];

    protected $casts = ['uploaded_at' => 'datetime'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
