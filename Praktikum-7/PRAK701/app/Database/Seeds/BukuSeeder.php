<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BukuSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul'        => 'Laskar Pelangi',
                'penulis'      => 'Andrea Hirata',
                'penerbit'     => 'Bentang Pustaka',
                'tahun_terbit' => 2005
            ],
            [
                'judul'        => 'Negeri 5 Menara',
                'penulis'      => 'Ahmad Fuadi',
                'penerbit'     => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2009
            ],
            [
                'judul'        => 'Bumi',
                'penulis'      => 'Tere Liye',
                'penerbit'     => 'Gramedia',
                'tahun_terbit' => 2014
            ]
        ];

        $this->db->table('buku')->insertBatch($data);
    }
}
