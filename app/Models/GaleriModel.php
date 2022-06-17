<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{

  protected $table      = 'galeri';
  protected $returnType     = 'array';
  protected $primaryKey = 'id_galeri';
  protected $allowedFields = ['id_galeri', 'id_uploads', 'File'];
}
