<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DataSeeder extends Seeder
{
    public function run()
    {
        $this->call('DataPasienSeeder');
        $this->call('DataDokterSeeder');
        $this->call('DataApotekerSeeder');
        $this->call('KunjunganSeeder');
        $this->call('DataTransaksiSeeder');
    }
}
