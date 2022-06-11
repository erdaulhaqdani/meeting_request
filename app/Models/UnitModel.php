<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitModel extends Model
{
    protected $table      = 'unit';
    protected $returnType     = 'array';
    protected $primaryKey = 'idUnit';
    protected $allowedFields = ['namaUnit'];
}
