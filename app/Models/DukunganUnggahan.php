<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DukunganUnggahan extends Model
{
    protected $table = 'dukungan_unggahan';

    protected $primaryKey = 'id_dukungan';

    public $timestamps = false;

    protected $fillable = [
        'dibuat_pada',
        'unggahan_id_unggahan',
        'unggahan_pengguna_id_pengguna',
        'pengguna_id_pengguna',
    ];

    protected $casts = [
        'dibuat_pada' => 'datetime',
    ];

    // Relasi ke unggahan
    public function unggahan(): BelongsTo
    {
        return $this->belongsTo(
            Unggahan::class,
            'unggahan_id_unggahan',
            'id_unggahan'
        );
    }

    // Relasi ke pengguna
    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(
            Pengguna::class,
            'pengguna_id_pengguna',
            'id_pengguna'
        );
    }
}