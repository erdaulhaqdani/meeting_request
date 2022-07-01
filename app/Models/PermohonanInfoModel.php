<?php

namespace App\Models;

use CodeIgniter\Model;

class PermohonanInfoModel extends Model
{
    protected $table = 'permohonan_info';
    protected $primaryKey = 'idPermohonan';

    protected $allowedFields = ['Isi'];

    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $updatedField  = 'updated_at';

    public function getPermohonanInfo($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['idPetugas' => $id])->first();
    }
}
