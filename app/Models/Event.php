<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

    protected $primaryKey = 'id_event';

    public $timestamps = false;

    protected $fillable = [
        'nama_event',
        'deskripsi',
        'tanggal_event',
        'lokasi',
        'gambar',
        'status_event',
        'dibuat_pada',
        'id_admin',
    ];

    protected $casts = [
        'tanggal_event' => 'datetime',
        'dibuat_pada' => 'datetime',
    ];
}
