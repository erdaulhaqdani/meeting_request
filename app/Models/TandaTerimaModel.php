<?php

namespace App\Models;

use CodeIgniter\Model;

class TandaTerimaModel extends Model
{
    protected $table = 'tanda_terima';
    protected $primaryKey = 'id_tt';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['Pengirim', 'No_surat', 'Tanggal', 'Perihal', 'idPetugas'];

    public function getTandaTerima($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_tt' => $id])->first();
    }

    public function listTandaTerima($id)
    {

        $builder = $this->db->table('tanda_terima');
        $builder->where('idPetugas', $id);
        $builder->orderBy('Tanggal', 'DESC');
        $query = $builder->get();
        return $query;
    }

    function jumlah_tandaTerima($id)
    {
        $builder = $this->db->table('tanda_terima');
        $builder->where('idPetugas', $id);
        $builder->selectCount('id_tt');
        $query = $builder->get();
        return $query;
    }
}
