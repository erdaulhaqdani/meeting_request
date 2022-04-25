<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'idKategori';

    protected $allowedFields = ['namaKategori'];

    public function getKategori($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['idKategori' => $id])->first();
    }
}
