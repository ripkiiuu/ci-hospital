<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataObatSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama' => 'Paracetamol 500mg', 'harga' => 5000, 'stok' => 100],
            ['nama' => 'Amoxicillin 250mg', 'harga' => 10000, 'stok' => 50],
            ['nama' => 'Vitamin C', 'harga' => 3000, 'stok' => 200],
            ['nama' => 'Promag', 'harga' => 8000, 'stok' => 75]
        ];

        $this->db->table('data_obat')->insertBatch($data);
    }
}
