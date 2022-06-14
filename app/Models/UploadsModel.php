<?php

namespace App\Models;

use CodeIgniter\Model;

class UploadsModel extends Model
{
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
