<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Unggahan;
use App\Models\Komentar;
use App\Models\LaporanKonten;

class LaporanKonten extends Model
{
    protected $table = 'laporan_konten';

    protected $primaryKey = 'id_laporan_konten';

    public $timestamps = false;

    protected $fillable = [
        'alasan',
        'keterangan',
        'status_laporan',
        'dibuat_pada',
        'ditinjau_pada',
        'unggahan_id_unggahan',
        'unggahan_pengguna_id_pengguna',
        'komentar_id_komentar',
        'komentar_unggahan_id_unggahan',
        'komentar_unggahan_pengguna_id_pengguna',
        'komentar_pengguna_id_pengguna',
        'pengguna_id_pengguna',
        'pengguna_id_pengguna1',
    ];

    protected $casts = [
        'dibuat_pada' => 'datetime',
        'ditinjau_pada' => 'datetime',
    ];

    // Relasi ke unggahan yang dilaporkan
    public function unggahan(): BelongsTo
    {
        return $this->belongsTo(
            Unggahan::class,
            'unggahan_id_unggahan',
            'id_unggahan'
        );
    }

    // Relasi ke komentar yang dilaporkan
    public function komentar(): BelongsTo
    {
        return $this->belongsTo(
            Komentar::class,
            'komentar_id_komentar',
            'id_komentar'
        );
    }

    // Relasi ke pengguna yang membuat laporan
    public function pelapor(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'pengguna_id_pengguna1',
            'id_pengguna'
        );
    }

    // Relasi ke admin yang meninjau laporan
    public function peninjau(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'pengguna_id_pengguna',
            'id_pengguna'
        );
    }
}
