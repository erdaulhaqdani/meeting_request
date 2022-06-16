<?php

namespace App\Models;

use CodeIgniter\Model;

class UploadsModel extends Model
{

  protected $table      = 'uploads';
  protected $returnType     = 'array';
  protected $primaryKey = 'id_uploads';
  protected $allowedFields = ['id_uploads', 'Judul', 'Kategori'];

  public function getUploads($id_uploads = false)
  {
    if ($id_uploads == false) {
      return $this->findAll();
    }

    return $this->where(['id_uploads' => $id_uploads])->findAll();
  }

  public function insert_upload($data)
  {
    $builder = $this->db->table('uploads');
    $builder->insert($data);

    return $builder;
  }
  public function insert_galeri($data)
  {
    $builder = $this->db->table('galeri');
    $builder->insert($data);

    return $builder;
  }
}
