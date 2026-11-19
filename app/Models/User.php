<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Nama tabel database
    protected $table = 'pengguna';

    // Primary key
    protected $primaryKey = 'id_pengguna';

    // Tabel hanya menggunakan kolom dibuat_pada,
    // bukan created_at dan updated_at bawaan Laravel.
    public $timestamps = false;

    // Kolom yang boleh diisi
    protected $fillable = [
        'nama',
        'email',
        'kata_sandi',
        'peran',
        'status_akun',
        'dibuat_pada',
    ];

    // Kolom yang disembunyikan
    protected $hidden = [
        'kata_sandi',
    ];

    // Pengaturan tipe data
    protected $casts = [
        'kata_sandi' => 'hashed',
        'dibuat_pada' => 'datetime',
    ];

    // Memberitahu Laravel bahwa password ada di kolom kata_sandi
    public function getAuthPassword()
    {
        return $this->kata_sandi;
    }
}
