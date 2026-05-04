<?php

namespace App\Models\Cms;

use Illuminate\Database\Eloquent\Model;

class MediaFile extends Model
{
    protected $table = 'media_files';

    public $timestamps = false;
    // because you only have uploaded_at (no created_at / updated_at)

    protected $fillable = [
        'user_id',
        'file_name',
        'file_path',
        'file_type',
        'mime_type',
        'file_size',
        'width',
        'height',
        'duration',
        'uploaded_at',
    ];

    protected $casts = [
        'uploaded_at' => 'datetime',
    ];

    /*
    |----------------------------------------
    | RELATIONSHIP
    |----------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(\App\Models\Auth\User::class);
    }
}
