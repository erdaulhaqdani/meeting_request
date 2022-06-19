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

  public function getPetugasId($id = false)
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['idPetugas' => $id])->first();
  }

  public function getPetugasEskalasi($idPetugas, $idLevel, $unit)
  {
    $builder = $this->db->table('petugas_apt');
    $builder->where('idPetugas !=', $idPetugas);
    $builder->where('idPetugas !=', 1);
    $builder->where('idLevel <', $idLevel);
    $builder->where('idLevel !=', 1);
    $builder->where('Unit', $unit);

    $query = $builder->get();
    return $query;
  }

  function get_nip($nip, $tbl)
  {
    $builder = $this->db->table($tbl);
    $builder->where('NIP', $nip);
    $log = $builder->get()->getRow();
    return $log;
  }

  function jumlah_petugas()
  {
    $builder = $this->db->table('petugas_apt');
    $builder->where('idLevel !=', 1);
    $builder->selectCount('idPetugas');
    $query = $builder->get();
    return $query;
  }
}
