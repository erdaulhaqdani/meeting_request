<?php

namespace App\Models;

use CodeIgniter\Model;

class TandaTerimaModel extends Model
{
    protected $table = 'tanda_terima';
    protected $primaryKey = 'id_tt';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['Pengirim', 'No_surat', 'Tanggal', 'Perihal', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getTandaTerima($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_tt' => $id])->first();
    }
}
