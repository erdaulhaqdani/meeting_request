<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model
{
  protected $table      = 'petugas_apt';
  protected $primaryKey = 'idPetugas';

  protected $useAutoIncrement = true;

  protected $allowedFields = ['NIP', 'Nama', 'Email', 'idLevel', 'Unit', 'Password', 'Kantor'];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  // protected $validationRules    = [];
  // protected $validationMessages = [];
  // protected $skipValidation     = false;

  public function getPetugas($email = false)
  {
    if ($email == false) {
      return $this->findAll();
    }

    return $this->where(['Email' => $email])->first();
  }

  function get_nip($nip, $tbl)
  {
    $builder = $this->db->table($tbl);
    $builder->where('NIP', $nip);
    $log = $builder->get()->getRow();
    return $log;
  }
}
