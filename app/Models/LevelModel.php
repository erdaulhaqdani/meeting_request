<?php

namespace App\Models;

use CodeIgniter\Model;

class LevelModel extends Model
{
    protected $table = 'level_user';
    protected $primaryKey = 'idlevel';

    protected $allowedFields = ['Level'];

    public function getlevel($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['idLevel' => $id])->first();
    }
}
