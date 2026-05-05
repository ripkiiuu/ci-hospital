<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KunjunganSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tanggal' => '2023-12-04',
                'id_pasien' => 1,
                'id_dokter' => 1,
                'keluhan'   => 'Keluhan 1',
                'diagnosa' => 'Diagnosa 1',
                'preskripsi' => json_encode([
                    [
                        'id_obat' => 1
                    ],
                    [
                        'id_obat' => 2
                    ],
                    [
                        'id_obat' => 3
                    ],
                ])
            ],
            [
                'tanggal' => '2023-12-06',
                'id_pasien' => 2,
                'id_dokter' => 2,
                'keluhan'   => 'Keluhan 2',
                'diagnosa' => 'Diagnosa 2',
                'preskripsi' => json_encode([
                    [
                        'id_obat' => 5
                    ],
                    [
                        'id_obat' => 8
                    ],
                    [
                        'id_obat' => 4
                    ],
                ])
            ],
            [
                'tanggal' => '2023-12-12',
                'id_pasien' => 3,
                'id_dokter' => 1,
                'keluhan'   => 'Keluhan 3',
                'diagnosa' => 'Diagnosa 3',
                'preskripsi' => json_encode([
                    [
                        'id_obat' => 1
                    ],
                ])
            ],
        ];

        $this->db->table('kunjungan')->insertBatch($data);
    }
}
