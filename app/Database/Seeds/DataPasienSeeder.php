<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataPasienSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'          => 'Pasien A',
                'tanggal_lahir' => '1990-01-01',
                'alamat'        => 'Jl. ABC',
            ],
            [
                'nama'          => 'Pasien B',
                'tanggal_lahir' => '1995-05-05',
                'alamat'        => 'Jl. XYZ',
            ],
            [
                'nama'          => 'Pasien C',
                'tanggal_lahir' => '1980-10-10',
                'alamat'        => 'Jl. QRS',
            ]
        ];

        $this->db->table('data_pasien')->insertBatch($data);
    }
}
