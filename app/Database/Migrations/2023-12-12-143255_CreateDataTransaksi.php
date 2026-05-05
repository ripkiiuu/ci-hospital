<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDataTransaksi extends Migration
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
            'biaya_rs'  => [
                'type'           => 'INTEGER',
            ], 
            'biaya_apotek'  => [
                'type'           => 'INTEGER',
            ], 
            'status_rs'  => [
                'type'           => 'BOOLEAN',
            ],            
            'status_apotek'  => [
                'type'           => 'BOOLEAN',
            ],            
            'id_kunjungan'  => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ]            
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_kunjungan', 'kunjungan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('data_transaksi', true);
    }

    public function down()
    {
        $this->forge->dropTable('data_transaksi');
    }
}
