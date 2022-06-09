<?php

namespace App\Models;

use CodeIgniter\Model;

class AgendaModel extends Model
{
  protected $table      = 'agenda';
  protected $primaryKey = 'idAgenda';

  protected $useAutoIncrement = true;

  protected $allowedFields = ['Judul', 'Isi', 'Status', 'Cover', 'tgl_kegiatan', 'Penulis', 'idPetugas'];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  // protected $validationRules    = [];
  // protected $validationMessages = [];
  // protected $skipValidation     = false;

  public function getAgenda($id = false)
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['idAgenda' => $id])->first();
  }
}
