<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCredentialsToPasien extends Migration
{
    public function up()
    {
        $this->forge->addColumn('data_pasien', [
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'after'      => 'alamat',
                'null'       => true,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'after'      => 'username',
                'null'       => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('data_pasien', ['username', 'password']);
    }
}
