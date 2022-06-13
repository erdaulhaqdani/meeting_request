<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    protected $table      = 'jabatan';
    protected $returnType     = 'array';
    protected $primaryKey = 'idJabatan';
    protected $allowedFields = ['posisiJabatan'];
}
