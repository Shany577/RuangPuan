<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DirektoriBantuan extends Model
{
    protected $table = 'direktori_bantuan';

    protected $primaryKey = 'id_bantuan';

    public $timestamps = false;

    protected $fillable = [
        'nama_lembaga',
        'deskripsi',
        'kontak',
        'alamat',
        'tautan',
        'status',
    ];
}
