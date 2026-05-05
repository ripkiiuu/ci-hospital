<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataDokterSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'          => 'Dokter A',
                'spesialisasi'  => 'Kulit',
                'username'      => 'dokter_a',
                'password'      => password_hash("password", PASSWORD_BCRYPT),
            ],
            [
                'nama'          => 'Dokter B',
                'spesialisasi'  => 'Mata',
                'username'      => 'dokter_b',
                'password'      => password_hash("password", PASSWORD_BCRYPT),
            ],
            [
                'nama'          => 'Dokter C',
                'spesialisasi'  => 'Gigi',
                'username'      => 'dokter_c',
                'password'      => password_hash("password", PASSWORD_BCRYPT),
            ],
        ];

        $this->db->table('data_dokter')->insertBatch($data);
    }
}
