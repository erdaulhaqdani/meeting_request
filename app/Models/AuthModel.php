<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
  protected $table      = 'user';
  protected $primaryKey = 'Email';

  protected $useAutoIncrement = true;

  protected $allowedFields = ['Email', 'Password'];

  function get_data_login($email, $tbl)
  {
    $builder = $this->db->table($tbl);
    $builder->where('Email', $email);
    $log = $builder->get()->getRow();
    return $log;
  }
}
