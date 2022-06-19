<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table      = 'pegawai';
    protected $returnType     = 'array';
    protected $useTimestamps = true;
    protected $primaryKey = 'idPegawai';
    protected $allowedFields = ['nip', 'nama', 'email', 'jenisKelamin', 'password', 'status', 'created_at', 'updated_at', 'idJabatan', 'idUnit'];

    public function getPegawai($idPegawai = false)
    {
        if ($idPegawai == false) {
            return $this->findAll();
        }

        return $this->where(['idPegawai' => $idPegawai])->first();
    }

    function jumlah_pegawai()
    {
        $builder = $this->db->table('pegawai');
        $builder->selectCount('idPegawai');
        $query = $builder->get();
        return $query;
    }

    // Model dan Query Builder untuk menampilan Daftar PIC terkait
    public function pegawai()
    {
        /**
         * SELECT * FROM penugasan
         * WHERE status = 'Selesai'
         */
        $builder = $this->db->table('pegawai');
        $query = $builder->get();
        return $query;
    }

    public function cek_password($passwordLama)
    {
        return $this->db->table('pegawai')
            ->where(['password' => $passwordLama])
            ->get()->getRowArray();
    }
}
