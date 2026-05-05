<?php

namespace App\Models;

use CodeIgniter\Model;

class Kunjungan extends Model
{
    protected $table            = 'kunjungan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['tanggal', 'id_pasien', 'id_dokter', 'keluhan', 'diagnosa', 'preskripsi'];
}
