<?php

namespace App\Models;

use CodeIgniter\Model;

class DataTransaksi extends Model
{
    protected $table            = 'data_transaksi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['tanggal', 'biaya_rs', 'biaya_apotek', 'status_rs', 'status_apotek', 'id_kunjungan'];
}
