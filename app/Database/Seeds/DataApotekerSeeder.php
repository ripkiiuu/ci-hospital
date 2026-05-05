<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataApotekerSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'     => 'Apoteker A',
                'username' => 'apoteker_a',
                'password' => password_hash("password", PASSWORD_BCRYPT),
            ],
            [
                'nama'     => 'Apoteker B',
                'username' => 'apoteker_b',
                'password' => password_hash("password", PASSWORD_BCRYPT),
            ],
        ];

        $this->db->table('data_apoteker')->insertBatch($data);
    }
}
