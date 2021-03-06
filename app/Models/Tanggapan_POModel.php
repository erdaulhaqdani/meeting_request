<?php

namespace App\Models;

use CodeIgniter\Model;

class Tanggapan_POModel extends Model
{
    protected $table      = 'tanggapan_po';
    protected $primaryKey = 'idTanggapan_PO ';

    protected $allowedFields = ['Isi', 'Lampiran', 'tgl_mulai', 'tgl_selesai', 'idPengaduan', 'idPetugas'];

    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $createdField  = 'tgl_mulai';
    protected $updatedField  = 'tgl_selesai';

    public function getTanggapan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['idTanggapan_PO ' => $id])->first();
    }

    public function getTanggapanPengaduan($id)
    {
        $query = $this->where(['idPengaduan ' => $id])->orderBy('tgl_selesai', 'DESC')->first();
        return $query;
    }

    public function trackTanggapanPengaduan($id)
    {
        $query = $this->where(['idPengaduan ' => $id])->orderBy('tgl_selesai', 'DESC')->find();
        return $query;
    }
}
