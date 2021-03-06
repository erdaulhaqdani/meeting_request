<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{

  protected $table      = 'galeri';
  protected $returnType     = 'array';
  protected $primaryKey = 'id_galeri';
  protected $allowedFields = ['id_galeri', 'id_uploads', 'File'];

  public function getGambar($id_uploads = false)
  {
    if ($id_uploads == false) {
      return $this->findAll();
    }

    return $this->where(['id_uploads' => $id_uploads])->find();
  }

  public function getNamaFile($id)
  {

    $builder = $this->db->table('galeri');
    $builder->where('id_uploads', $id);
    $query = $builder->get();
    return $query;
  }
}
