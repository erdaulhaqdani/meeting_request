<?php

namespace App\Models;

use CodeIgniter\Model;

class Level_petugasModel extends Model
{
    protected $table = 'level_petugas';
    protected $primaryKey = 'idlevel';

    protected $allowedFields = ['Level', 'idlevel'];

    public function getlevel($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['idLevel' => $id])->first();
    }
}
