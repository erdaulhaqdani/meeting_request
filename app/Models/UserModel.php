<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'idUser ';

    protected $allowedFields = ['Email', 'Password', 'idLevel'];

    protected $useAutoIncrement = true;

    public function getUser($email = false)
    {
        if ($email == false) {
            return $this->findAll();
        }

        return $this->where(['Email ' => $email])->first();
    }
}
