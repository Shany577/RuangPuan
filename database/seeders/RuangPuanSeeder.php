<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuangPuanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kategori')->insert([
            [
                'nama_kategori' => 'Kesehatan Mental',
                'deskripsi' => 'Informasi dan dukungan seputar kesehatan mental perempuan.',
            ],
            [
                'nama_kategori' => 'Pendidikan',
                'deskripsi' => 'Informasi mengenai pendidikan dan pengembangan diri.',
            ],
            [
                'nama_kategori' => 'Hukum dan Perlindungan',
                'deskripsi' => 'Informasi mengenai hak, hukum, dan perlindungan perempuan.',
            ],
            [
                'nama_kategori' => 'Pemberdayaan Ekonomi',
                'deskripsi' => 'Informasi mengenai peluang usaha dan kemandirian ekonomi.',
            ],
            [
                'nama_kategori' => 'Kekerasan terhadap Perempuan',
                'deskripsi' => 'Informasi dan dukungan terkait pencegahan serta penanganan kekerasan.',
            ],
        ]);
    }
}
