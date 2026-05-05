<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDataPasien extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'      => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'tanggal_lahir'    => [
                'type'           => 'DATE',
            ],
            'alamat'  => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ], 
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('data_pasien', true);
    }

    public function down()
    {
        $this->forge->dropTable('data_pasien');
    }
}
