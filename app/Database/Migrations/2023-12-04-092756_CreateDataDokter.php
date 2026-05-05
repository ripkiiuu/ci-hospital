<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDataDokter extends Migration
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
            'spesialisasi'  => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ], 
            'username'  => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ], 
            'password'  => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ], 
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('data_dokter', true);
    }

    public function down()
    {
        $this->forge->dropTable('data_dokter');
    }
}
