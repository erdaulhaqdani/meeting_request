<?php

namespace App\Models;

use CodeIgniter\Model;

class Tanggapan_MRModel extends Model
{
    protected $table      = 'tanggapan_mr';
    protected $primaryKey = 'idTanggapan_MR ';

    protected $allowedFields = ['Isi', 'Lampiran', 'tgl_mulai', 'tgl_selesai', 'idMeeting'];

    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $createdField  = 'tgl_mulai';
    protected $updatedField  = 'tgl_selesai';

    public function getTanggapan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['idTanggapan_MR ' => $id])->first();
    }
}
