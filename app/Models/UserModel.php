<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'Email ';

    protected $allowedFields = ['Email', 'Password', 'idLevel'];

    public function getUser($email = false)
    {
        if ($email == false) {
            return $this->findAll();
        }

        return $this->where(['Email ' => $email])->first();
    }
}
