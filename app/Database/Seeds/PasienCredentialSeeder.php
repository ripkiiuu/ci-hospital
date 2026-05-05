<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PasienCredentialSeeder extends Seeder
{
    public function run()
    {
        $pasiens = $this->db->table('data_pasien')->get()->getResultArray();

        foreach ($pasiens as $p) {
            // Generate username: "Pasien A" -> "pasien_a"
            $nameParts = explode(' ', strtolower($p['nama']));
            $username = implode('_', $nameParts);
            $password = password_hash('password', PASSWORD_BCRYPT);

            $this->db->table('data_pasien')->where('id', $p['id'])->update([
                'username' => $username,
                'password' => $password,
            ]);
        }
    }
}
