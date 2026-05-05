<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataTransaksiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tanggal'       => '2023-12-09 13:47:09',
                'biaya_rs'      => 200000,
                'biaya_apotek'  => 100000,
                'status_rs'     => true,
                'status_apotek' => true,
                'id_kunjungan'  => 1
            ],
            [
                'tanggal'       => '2023-12-09 16:20:10',
                'biaya_rs'      => 235000,
                'biaya_apotek'  => 150000,
                'status_rs'     => true,
                'status_apotek' => false,
                'id_kunjungan'  => 2
            ],
            [
                'tanggal'       => '2023-12-09 23:28:29',
                'biaya_rs'      => 100000,
                'biaya_apotek'  => 70000,
                'status_rs'     => false,
                'status_apotek' => false,
                'id_kunjungan'  => 3
            ],
        ];

        $this->db->table('data_transaksi')->insertBatch($data);
    }
}
