
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unggahan extends Model
{
    protected $table = 'unggahan';

    protected $primaryKey = 'id_unggahan';

    public $timestamps = false;

    protected $fillable = [
        'judul',
        'isi',
        'status_moderasi',
        'dibuat_pada',
        'diperbarui_pada',
        'pengguna_id_pengguna',
        'kategori_id_kategori1',
    ];

    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(
            Pengguna::class,
            'pengguna_id_pengguna',
            'id_pengguna'
        );
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(
            Kategori::class,
            'kategori_id_kategori1',
            'id_kategori'
        );
    }

    public function komentar(): HasMany
    {
        return $this->hasMany(
            Komentar::class,
            'unggahan_id_unggahan',
            'id_unggahan'
        );
    }

    public function dukungan(): HasMany
    {
        return $this->hasMany(
            DukunganUnggahan::class,
            'unggahan_id_unggahan',
            'id_unggahan'
        );
    }
}
