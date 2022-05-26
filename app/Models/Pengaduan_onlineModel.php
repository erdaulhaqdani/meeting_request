<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengaduan_onlineModel extends Model
{
    protected $table      = 'pengaduan_online';
    protected $primaryKey = 'idPengaduan';

    protected $allowedFields = ['Judul', 'Isi', 'idKategori', 'Lampiran', 'Status', 'idCustomer', 'Rating', 'Ulasan'];

    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPengaduan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['idPengaduan' => $id])->first();
    }

    public function listPengaduanCustomer($id)
    {
        /**
         * SELECT * FROM pengaduan_online
         * WHERE idCustomer = '1'
         */
        $builder = $this->db->table('pengaduan_online');
        $builder->where('idCustomer', $id);
        $query = $builder->get();
        return $query;
    }

    public function listPengaduanCustomer2($id, $status)
    {
        /**
         * SELECT * FROM pengaduan_online
         * WHERE idCustomer = '1'
         */
        $builder = $this->db->table('pengaduan_online');
        $builder->where('idCustomer', $id);
        $builder->like('Status', $status);
        $query = $builder->get();
        return $query;
    }

    public function jumlahPengaduan($id, $status)
    {
        /**
         * SELECT * FROM pengaduan_online
         * WHERE idCustomer = '1' AND Status LIKE "%Sedang Diproses%"
         */
        $builder = $this->db->table('pengaduan_online');
        $builder->where('idCustomer', $id);
        $builder->like('Status', $status);
        $builder->selectCount('idPengaduan');
        $query = $builder->get();
        return $query;
    }

    // Model pengaduan untuk admin

    public function listPengaduanAdmin($level, $kategori)
    {
        /**
         * SELECT * FROM pengaduan_online
         * WHERE Status LIKE 'Belum Diproses' OR Status LIKE 'Sedang Diproses'
         */
        $builder = $this->db->table('pengaduan_online');
        $builder->notlike('Status', 'Dibatalkan');
        // $builder->where('idLevel', $level);
        if ($level != 1) {
            $builder->where('idKategori', $kategori);
        }
        $query = $builder->get();
        return $query;
    }

    public function listPengaduanAdmin2($status, $level, $kategori)
    {
        /**
         * SELECT * FROM pengaduan_online
         * WHERE Status LIKE 'Belum Diproses' OR Status LIKE 'Sedang Diproses'
         */
        $builder = $this->db->table('pengaduan_online');
        $builder->like('Status', $status);
        $builder->notlike('Status', 'Dibatalkan');
        // $builder->where('idLevel', '1');
        if ($level != 1) {
            $builder->where('idKategori', $kategori);
        }
        $query = $builder->get();
        return $query;
    }

    public function jumlahPengaduanAdmin($status, $level, $kategori)
    {
        /**
         * SELECT * FROM pengaduan_online
         * WHERE idCustomer = '1' AND Status LIKE "%Sedang Diproses%"
         */
        $builder = $this->db->table('pengaduan_online');
        $builder->like('Status', $status);
        if ($level != 1) {
            $builder->where('idKategori', $kategori);
        }
        $builder->selectCount('idPengaduan');
        $query = $builder->get();
        return $query;
    }

    public function groupByStatus($idCustomer)
    {
        $builder = $this->db->table('pengaduan_online');
        $builder->selectCount('idPengaduan', 'Jumlah');
        $builder->select('Status');
        $builder->where('idCustomer', $idCustomer);
        $builder->groupBy('Status');
        $query = $builder->get();
        return $query;
    }
    public function pengaduanPerminggu($idCustomer)
    {
        /*SELECT COUNT(created_at) AS 'Jumlah', DATE_FORMAT(created_at, "%e %M %Y")
        FROM `pengaduan_online` GROUP BY DATE_FORMAT(created_at, "%e %M %Y")*/

        $builder = $this->db->table('pengaduan_online');
        $builder->select('COUNT(created_at) AS jumlah, created_at as tanggal');
        $builder->where('idCustomer', $idCustomer);
        $builder->where('created_at >=', 'NOW()');
        $builder->groupBy('DATE_FORMAT(created_at, "%e %M %Y")');
        $builder->orderBy('created_at', 'asc');
        $builder->limit(7);
        $query = $builder->get();
        return $query;
    }
}
