<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pengguna extends Model
{
    protected $table = 'pengguna';

    protected $primaryKey = 'id_pengguna';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'email',
        'kata_sandi',
        'peran',
        'status_akun',
        'dibuat_pada',
    ];

    protected $hidden = [
        'kata_sandi',
    ];

    protected $casts = [
        'dibuat_pada' => 'datetime',
    ];

    // Relasi ke unggahan
    public function unggahan(): HasMany
    {
        return $this->hasMany(
            Unggahan::class,
            'pengguna_id_pengguna',
            'id_pengguna'
        );
    }

    // Relasi ke komentar
    public function komentar(): HasMany
    {
        return $this->hasMany(
            Komentar::class,
            'pengguna_id_pengguna',
            'id_pengguna'
        );
    }

    // Relasi ke dukungan unggahan
    public function dukunganUnggahan(): HasMany
    {
        return $this->hasMany(
            DukunganUnggahan::class,
            'pengguna_id_pengguna',
            'id_pengguna'
        );
    }
}