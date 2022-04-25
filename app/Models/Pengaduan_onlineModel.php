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

    public function jumlahPengaduanDiproses($id)
    {
        /**
         * SELECT * FROM pengaduan_online
         * WHERE idCustomer = '1' AND Status LIKE "%Sedang Diproses%"
         */
        $builder = $this->db->table('pengaduan_online');
        $builder->where('idCustomer', $id);
        $builder->like('Status', 'Sedang Diproses');
        $builder->selectCount('idPengaduan');
        $query = $builder->get();
        return $query;
    }

    public function jumlahPengaduanBelumDiproses($id)
    {
        /**
         * SELECT * FROM pengaduan_online
         * WHERE idCustomer = '1' AND Status LIKE "%Belum Diproses%"
         */
        $builder = $this->db->table('pengaduan_online');
        $builder->where('idCustomer', $id);
        $builder->like('Status', 'Belum Diproses');
        $builder->selectCount('idPengaduan');
        $query = $builder->get();
        return $query;
    }

    public function jumlahPengaduanSelesaiDiproses($id)
    {
        /**
         * SELECT * FROM pengaduan_online
         * WHERE idCustomer = '1' AND Status LIKE "%Belum Diproses%"
         */
        $builder = $this->db->table('pengaduan_online');
        $builder->where('idCustomer', $id);
        $builder->like('Status', 'Selesai Diproses');
        $builder->selectCount('idPengaduan');
        $query = $builder->get();
        return $query;
    }

    // Model pengaduan untuk admin

    public function listPengaduanAdmin()
    {
        /**
         * SELECT * FROM pengaduan_online
         * WHERE Status LIKE 'Belum Diproses' OR Status LIKE 'Sedang Diproses'
         */
        $builder = $this->db->table('pengaduan_online');
        $builder->notlike('Status', 'Dibatalkan');
        // $builder->where('idKategori', 4);
        // $builder->where('idLevel', '1');
        $query = $builder->get();
        return $query;
    }

    public function jumlahPengaduanDiprosesAdmin()
    {
        /**
         * SELECT * FROM pengaduan_online
         * WHERE idCustomer = '1' AND Status LIKE "%Sedang Diproses%"
         */
        $builder = $this->db->table('pengaduan_online');
        // $builder->where('idCustomer', $id);
        $builder->like('Status', 'Sedang Diproses');
        $builder->selectCount('idPengaduan');
        $query = $builder->get();
        return $query;
    }

    public function jumlahPengaduanBelumDiprosesAdmin()
    {
        /**
         * SELECT * FROM pengaduan_online
         * WHERE idCustomer = '1' AND Status LIKE "%Belum Diproses%"
         */
        $builder = $this->db->table('pengaduan_online');
        // $builder->where('idCustomer', $id);
        $builder->like('Status', 'Belum Diproses');
        $builder->selectCount('idPengaduan');
        $query = $builder->get();
        return $query;
    }

    public function jumlahPengaduanSelesaiDiprosesAdmin()
    {
        /**
         * SELECT * FROM pengaduan_online
         * WHERE idCustomer = '1' AND Status LIKE "%Belum Diproses%"
         */
        $builder = $this->db->table('pengaduan_online');
        // $builder->where('idCustomer', $id);
        $builder->like('Status', 'Selesai Diproses');
        $builder->selectCount('idPengaduan');
        $query = $builder->get();
        return $query;
    }
}
