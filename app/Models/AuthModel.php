<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
  function get_data_login($email, $tbl)
  {
    $builder = $this->db->table($tbl);
    $builder->where('Email', $email);
    $log = $builder->get()->getRow();
    return $log;
  }
}
