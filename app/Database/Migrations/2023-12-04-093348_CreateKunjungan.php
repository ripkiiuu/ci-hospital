<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKunjungan extends Migration
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
            'tanggal'    => [
                'type'           => 'DATETIME',
            ],
            'id_pasien'    => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'id_dokter'  => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'keluhan'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'diagnosa'    => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'preskripsi'    => [
                'type'           => 'JSON',
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_pasien', 'data_pasien', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_dokter', 'data_dokter', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kunjungan', true);
    }

    public function down()
    {
        $this->forge->dropTable('kunjungan');
    }
}
