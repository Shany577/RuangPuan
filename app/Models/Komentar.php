
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Komentar extends Model
{
    protected $table = 'komentar';

    protected $primaryKey = 'id_komentar';

    public $timestamps = false;

    protected $fillable = [
        'isi_komentar',
        'status_moderasi',
        'dibuat_pada',
        'unggahan_id_unggahan',
        'unggahan_pengguna_id_pengguna',
        'pengguna_id_pengguna',
    ];

    protected $casts = [
        'dibuat_pada' => 'datetime',
    ];

    public function unggahan(): BelongsTo
    {
        return $this->belongsTo(
            Unggahan::class,
            'unggahan_id_unggahan',
            'id_unggahan'
        );
    }

    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(
            Pengguna::class,
            'pengguna_id_pengguna',
            'id_pengguna'
        );
    }

    public function laporanKonten(): HasMany
    {
        return $this->hasMany(
            LaporanKonten::class,
            'komentar_id_komentar',
            'id_komentar'
        );
    }
}
