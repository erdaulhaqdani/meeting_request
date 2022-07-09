<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengaduan_onlineModel extends Model
{
    protected $table      = 'pengaduan_online';
    protected $primaryKey = 'idPengaduan';

    protected $allowedFields = ['Judul', 'Isi', 'idKategori', 'Lampiran', 'Status', 'Rating', 'Ulasan', 'idCustomer', 'idPetugas', 'notifCustomer', 'notifPetugas'];

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

    public function notifCustomer($idCustomer)
    {
        /**
         * SELECT `idPengaduan`,`Judul`,`updated_at`, `Tiket` FROM `pengaduan_online`
         * UNION ALL 
         * SELECT `idMeeting`,`Perihal`,`updated_at`, `Tiket` FROM meeting_request
         * ORDER BY updated_at DESC
         * LIMIT 3
         */
        $query = $this->db->query("SELECT `idPengaduan`,`Judul`,`updated_at`,`Tiket`,`Status` FROM `pengaduan_online`
                                    WHERE `idCustomer` = ? AND notifCustomer = 0
                                    UNION ALL 
                                    SELECT `idMeeting`,`Perihal`,`updated_at`,`Tiket`,`Status` FROM meeting_request
                                    WHERE `idCustomer` = ? AND notifCustomer = 0
                                    ORDER BY updated_at DESC
                                    LIMIT 5", [$idCustomer, $idCustomer]);
        return $query;
    }

    public function notifPetugas($idPetugas, $kategori)
    {
        /**
         * SELECT `idPengaduan`,`Judul`,`updated_at`, `Tiket` FROM `pengaduan_online`
         * UNION ALL 
         * SELECT `idMeeting`,`Perihal`,`updated_at`, `Tiket` FROM meeting_request
         * ORDER BY updated_at DESC
         * LIMIT 3
         */
        $query = $this->db->query("SELECT `idPengaduan`,`Judul`,`updated_at`,`Tiket`,`Status` FROM `pengaduan_online`
                                    WHERE `idPetugas` = ? AND notifPetugas = 0 OR `idPetugas` = 1 AND `notifPetugas` = 0 AND `idKategori` = ?
                                    UNION ALL 
                                    SELECT `idMeeting`,`Perihal`,`updated_at`,`Tiket`,`Status` FROM meeting_request
                                    WHERE `idPetugas` = ? AND notifPetugas = 0 OR `idPetugas` = 1 AND `notifPetugas` = 0 AND `idKategori` = ?
                                    ORDER BY updated_at DESC
                                    LIMIT 5", [$idPetugas, $kategori, $idPetugas, $kategori]);
        return $query;
    }

    public function listPengaduanCustomer($id)
    {
        /**
         * SELECT * FROM pengaduan_online
         * WHERE idCustomer = '1'
         */
        $builder = $this->db->table('pengaduan_online');
        $builder->where('idCustomer', $id);
        $builder->orderBy('created_at', 'DESC');
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

    public function listPengaduanAdmin($level, $kategori, $petugas)
    {
        /**
         * SELECT * FROM pengaduan_online
         * WHERE Status LIKE 'Belum Diproses' OR Status LIKE 'Sedang Diproses'
         */
        $builder = $this->db->table('pengaduan_online');
        // $builder->where('idLevel', $level);
        if ($level != 2) {
            $builder->where('idKategori', $kategori);
        }
        $builder->where('idPetugas', 1);
        $builder->like('Status', 'Belum diproses');
        $builder->orWhere('idPetugas', $petugas);
        $builder->like('Status', 'Eskalasi');
        $builder->orWhere('idPetugas', $petugas);
        $query = $builder->get();
        return $query;
    }

    public function listPengaduanAdmin2($status, $level, $kategori, $petugas)
    {
        /**
         * SELECT * FROM pengaduan_online
         * WHERE Status LIKE 'Belum Diproses' OR Status LIKE 'Sedang Diproses'
         */
        $builder = $this->db->table('pengaduan_online');
        $builder->like('Status', $status);
        $builder->notlike('Status', 'Dibatalkan');
        if ($level != 2) {
            $builder->where('idKategori', $kategori);
        }
        $builder->orLike('Status', 'Eskalasi');
        $builder->where('idPetugas', $petugas);
        $builder->orLike('Status', 'proses');
        $builder->where('idPetugas', $petugas);
        $builder->orWhere('idPetugas', 1);
        $query = $builder->get();
        return $query;
    }

    public function jumlahPengaduanAdmin($status, $petugas, $kategori)
    {
        /**
         * SELECT * FROM pengaduan_online
         * WHERE  Status LIKE "%status%" AND idPetugas = 'petugas' OR idPetugas = '1' Status LIKE "%status%"
         */
        $builder = $this->db->table('pengaduan_online');
        $builder->like('Status', $status);
        $builder->where('idPetugas', $petugas);
        $builder->orWhere('idPetugas', 1);
        $builder->where('idKategori', $kategori);
        $builder->like('Status', $status);
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
        $builder->orderBy('Status', 'ASC');
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
        $builder->orderBy('created_at', 'desc');
        $builder->limit(7);
        $query = $builder->get();
        return $query;
    }

    public function groupByStatusPetugas($idPetugas, $kategori, $period)
    {
        $builder = $this->db->table('pengaduan_online');
        $builder->selectCount('idPengaduan', 'Jumlah');
        $builder->select('Status');
        $builder->where('idPetugas', $idPetugas);
        $builder->where('updated_at >=', $period);
        $builder->orWhere('idPetugas', 1);
        $builder->where('idKategori', $kategori);
        $builder->groupBy('Status');
        $builder->orderBy('Status', 'ASC');
        $query = $builder->get();
        return $query;
    }
    public function pengaduanPetugasPerminggu($idPetugas, $kategori)
    {
        /*SELECT COUNT(created_at) AS 'Jumlah', DATE_FORMAT(created_at, "%e %M %Y")
        FROM `pengaduan_online` GROUP BY DATE_FORMAT(created_at, "%e %M %Y")*/

        $builder = $this->db->table('pengaduan_online');
        $builder->select('COUNT(created_at) AS jumlah, created_at as tanggal');
        $builder->where('idPetugas', $idPetugas);
        $builder->where('created_at >=', 'NOW()');
        $builder->orWhere('idPetugas', 1);
        $builder->where('idKategori', $kategori);
        $builder->where('created_at >=', 'NOW()');
        $builder->groupBy('DATE_FORMAT(created_at, "%e %M %Y")');
        $builder->orderBy('created_at', 'desc');
        $builder->limit(7);
        $query = $builder->get();
        return $query;
    }

    public function lastPengaduan($idCustomer)
    {
        $builder = $this->db->table('pengaduan_online');
        $builder->where('idCustomer', $idCustomer);
        $builder->orderBy('created_at', 'DESC');
        $query = $builder->get(4, 0);
        return $query;
    }

    function jumlah_pengaduanCustomer($idCustomer)
    {
        $builder = $this->db->table('pengaduan_online');
        $builder->where('idCustomer', $idCustomer);
        $builder->selectCount('idPengaduan');
        $query = $builder->get();
        return $query;
    }
}
