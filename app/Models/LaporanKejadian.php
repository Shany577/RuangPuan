<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaporanKejadian extends Model
{
    protected $table = 'laporan_kejadian';

    protected $primaryKey = 'id_laporan_kejadian';

    public $timestamps = false;

    protected $fillable = [
        'jenis_kegiatan',
        'kronologi',
        'tanggal_kejadian',
        'tingkat_urgensi',
        'catatan_admin',
        'status_laporan',
        'dibuat_pada',
        'direktori_bantuan_id_bantuan',
        'pengguna_id_pengguna',
        'pengguna_id_pengguna1',
    ];

    protected $casts = [
        'tanggal_kejadian' => 'date',
        'dibuat_pada' => 'datetime',
    ];

    // Relasi ke pengguna yang meninjau laporan
    public function peninjau(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'pengguna_id_pengguna',
            'id_pengguna'
        );
    }

    // Relasi ke pengguna yang melaporkan kejadian
    public function pelapor(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'pengguna_id_pengguna1',
            'id_pengguna'
        );
    }

    // Relasi ke direktori bantuan
    public function direktoriBantuan(): BelongsTo
    {
        return $this->belongsTo(
            DirektoriBantuan::class,
            'direktori_bantuan_id_bantuan',
            'id_bantuan'
        );
    }
}
