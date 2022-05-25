<?php

namespace App\Models;

use CodeIgniter\Model;

class Meeting_requestModel extends Model
{
  protected $table      = 'meeting_request';
  protected $primaryKey = 'idMeeting';

  protected $allowedFields = ['Tanggal_kunjungan', 'Waktu_kunjungan', 'Kantor', 'Bentuk_layanan', 'Perihal', 'Telepon', 'Status', 'idKategori', 'idCustomer', 'updated_at'];

  protected $useAutoIncrement = true;
  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  public function getMeetingRequest($id = false)
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['idMeeting' => $id])->first();
  }

  public function listMeetingRequest($id)
  {

    $builder = $this->db->table('meeting_request');
    $builder->where('idCustomer', $id);
    $query = $builder->get();
    return $query;
  }

  public function TanggalKunjungan($myDate)
  {

    $builder = $this->db->table('meeting_request');
    $builder->where('Tanggal_kunjungan', $myDate);
    $query = $builder->get();
    return $query;
  }

  // Model meeting request untuk petugas APT

  public function jumlahMeetingRequest($id, $status)
  {
    $builder = $this->db->table('meeting_request');
    $builder->where('idCustomer', $id);
    $builder->like('Status', $status);
    $builder->selectCount('idMeeting');
    $query = $builder->get();
    return $query;
  }

  public function listMeetingPetugas($level, $kategori)
  {

    $builder = $this->db->table('meeting_request');
    $builder->notlike('Status', 'Dibatalkan');
    if ($level == 5) {
      $builder->where('idKategori', $kategori);
    }
    $query = $builder->get();
    return $query;
  }

  public function jumlahMeetingDiprosesPetugas()
  {

    $builder = $this->db->table('meeting_request');
    $builder->like('Status', 'Sedang Diproses');
    $builder->selectCount('idMeeting');
    $query = $builder->get();
    return $query;
  }

  public function jumlahMeetingBelumDiprosesPetugas()
  {

    $builder = $this->db->table('meeting_request');
    $builder->like('Status', 'Belum Diproses');
    $builder->selectCount('idMeeting');
    $query = $builder->get();
    return $query;
  }

  public function jumlahMeetingSelesaiDiprosesPetugas()
  {

    $builder = $this->db->table('meeting_request');
    $builder->like('Status', 'Selesai Diproses');
    $builder->selectCount('idMeeting');
    $query = $builder->get();
    return $query;
  }

  public function groupByStatus($idCustomer)
  {
    $builder = $this->db->table('meeting_request');
    $builder->selectCount('idMeeting', 'Jumlah');
    $builder->select('Status');
    $builder->where('idCustomer', $idCustomer);
    $builder->groupBy('Status');
    $query = $builder->get();
    return $query;
  }
}
