<?php

namespace App\Models;

use CodeIgniter\Model;

class Pasien extends Model
{
    protected $table            = 'data_pasien';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['nama', 'tanggal_lahir', 'alamat', 'username', 'password'];
}
