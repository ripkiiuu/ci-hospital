<?php

namespace App\Models;

use CodeIgniter\Model;

class Dokter extends Model
{
    protected $table            = 'data_dokter';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['nama', 'spesialisasi', 'username', 'password'];
}
