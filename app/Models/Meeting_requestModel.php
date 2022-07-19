<?php

namespace App\Models;

use CodeIgniter\Model;

class Meeting_requestModel extends Model
{
  protected $table      = 'meeting_request';
  protected $primaryKey = 'idMeeting';

  protected $allowedFields = ['Tanggal_kunjungan', 'Waktu_kunjungan', 'Kantor', 'Bentuk_layanan', 'Perihal', 'Status', 'idKategori', 'idCustomer', 'updated_at', 'File_lampiran', 'idPetugas', 'Rating', 'Ulasan', 'notifCustomer', 'notifPetugas'];

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

  public function notifPetugasMR($idPetugas)
  {
    /**
     * SELECT `idPengaduan`,`Judul`,`updated_at`, `Tiket` FROM `pengaduan_online`
     * UNION ALL 
     * SELECT `idMeeting`,`Perihal`,`updated_at`, `Tiket` FROM meeting_request
     * ORDER BY updated_at DESC
     * LIMIT 3
     */
    $query = $this->db->query("SELECT `idPengaduan`,`Judul`,`updated_at`,`Tiket`,`Status` FROM `pengaduan_online`
                                    WHERE `idPetugas` = ? AND notifCustomer = 0
                                    UNION ALL 
                                    SELECT `idMeeting`,`Perihal`,`updated_at`,`Tiket`,`Status` FROM meeting_request
                                    WHERE `idPetugas` = ? AND notifCustomer = 0
                                    ORDER BY updated_at
                                    LIMIT 5", [$idPetugas, $idPetugas]);
    return $query;
  }

  public function listMeetingRequest($id)
  {

    $builder = $this->db->table('meeting_request');
    $builder->where('idCustomer', $id);
    $builder->orderBy('created_at', 'DESC');
    $builder->orderBy('Status', 'DESC');
    $query = $builder->get();
    return $query;
  }

  public function lastMeetingRequest($id)
  {
    $builder = $this->db->table('meeting_request');
    $builder->where('idCustomer', $id);
    $builder->orderBy('created_at', 'DESC');
    $query = $builder->get(4, 0);
    return $query;
  }

  public function TanggalKunjungan($myDate)
  {

    $builder = $this->db->table('meeting_request');
    $builder->where('Tanggal_kunjungan', $myDate);
    $query = $builder->get();
    return $query;
  }

  // Model meeting request untuk petugas
  public function jumlahMeetingRequest($id, $status)
  {
    $builder = $this->db->table('meeting_request');
    $builder->where('idCustomer', $id);
    $builder->like('Status', $status);
    $builder->selectCount('idMeeting');
    $query = $builder->get();
    return $query;
  }

  public function listMeetingPetugas($petugas)
  {
    /**
     * SELECT * FROM meeting_request
     * WHERE Status LIKE 'Belum Diproses' OR Status LIKE 'Sedang Diproses'
     */
    $builder = $this->db->table('meeting_request');

    $builder->where('idPetugas', $petugas);
    $builder->orWhere('idPetugas', 1);
    $builder->orderBy('created_at', 'DESC');

    $query = $builder->get();
    return $query;
  }

  public function jumlahMeetingPetugas($status, $petugas)
  {
    /**
     * SELECT * FROM pengaduan_online
     * WHERE idCustomer = '1' AND Status LIKE "%Sedang Diproses%"
     */
    $builder = $this->db->table('Meeting_request');
    $builder->like('Status', $status);
    $builder->where('idPetugas', $petugas);
    $builder->orWhere('idPetugas', 1);
    $builder->like('Status', $status);
    $builder->selectCount('idMeeting');
    $query = $builder->get();
    return $query;
  }

  // public function jumlahMeetingDiprosesPetugas()
  // {

  //   $builder = $this->db->table('meeting_request');
  //   $builder->like('Status', 'Sedang Diproses');
  //   $builder->selectCount('idMeeting');
  //   $query = $builder->get();
  //   return $query;
  // }

  // public function jumlahMeetingBelumDiprosesPetugas()
  // {

  //   $builder = $this->db->table('meeting_request');
  //   $builder->like('Status', 'Belum Diproses');
  //   $builder->selectCount('idMeeting');
  //   $query = $builder->get();
  //   return $query;
  // }

  // public function jumlahMeetingSelesaiDiprosesPetugas()
  // {

  //   $builder = $this->db->table('meeting_request');
  //   $builder->like('Status', 'Selesai Diproses');
  //   $builder->selectCount('idMeeting');
  //   $query = $builder->get();
  //   return $query;
  // }

  public function groupByStatus($idCustomer, $kategori, $period)
  {
    $builder = $this->db->table('meeting_request');
    $builder->selectCount('idMeeting', 'Jumlah');
    $builder->select('Status');
    $builder->where('idCustomer', $idCustomer);
    if ($kategori != 0) {
      $builder->where('idKategori', $kategori);
    }
    $builder->where('Tanggal_kunjungan >=', $period);
    $builder->groupBy('Status');
    $query = $builder->get();
    return $query;
  }

  public function meetingRequestPerminggu($idCustomer, $period)
  {
    /*SELECT COUNT(created_at) AS 'Jumlah', DATE_FORMAT(created_at, "%e %M %Y")
        FROM `pengaduan_online` GROUP BY DATE_FORMAT(created_at, "%e %M %Y")*/

    $builder = $this->db->table('meeting_request');
    $builder->select('COUNT(updated_at) AS jumlah, updated_at as tanggal');
    $builder->where('idCustomer', $idCustomer);
    $builder->where('updated_at >=', $period);
    $builder->groupBy('DATE_FORMAT(updated_at, "%e %M %Y")');
    $query = $builder->get();
    return $query;
  }

  public function groupByStatusPetugas($idPetugas, $kategori, $period)
  {
    $builder = $this->db->table('meeting_request');
    $builder->selectCount('idMeeting', 'Jumlah');
    $builder->select('Status');
    $builder->where('idPetugas', $idPetugas);
    $builder->where('Tanggal_kunjungan >=', $period);
    if ($kategori != 0) {
      $builder->where('idKategori', $kategori);
    }
    $builder->orWhere('idPetugas', 1);
    $builder->where('Tanggal_kunjungan >=', $period);
    if ($kategori != 0) {
      $builder->where('idKategori', $kategori);
    }
    $builder->groupBy('Status');
    $query = $builder->get();
    return $query;
  }

  public function meetingRequestPetugasPerminggu($idPetugas, $period)
  {
    /*SELECT COUNT(created_at) AS 'Jumlah', DATE_FORMAT(created_at, "%e %M %Y")
        FROM `pengaduan_online` GROUP BY DATE_FORMAT(created_at, "%e %M %Y") WHERE idPetugas = 'id' AND created_at >= NOW() */

    $builder = $this->db->table('meeting_request');
    $builder->select('COUNT(updated_at) AS jumlah, updated_at as tanggal');
    $builder->where('idPetugas', $idPetugas);
    $builder->where('updated_at >=', $period);
    $builder->orWhere('idPetugas', 1);
    $builder->where('updated_at >=', $period);
    $builder->groupBy('DATE_FORMAT(updated_at, "%e %M %Y")');
    $query = $builder->get();
    return $query;
  }

  function jumlah_meetingCustomer($idCustomer)
  {
    $builder = $this->db->table('meeting_request');
    $builder->where('idCustomer', $idCustomer);
    $builder->selectCount('idMeeting');
    $query = $builder->get();
    return $query;
  }
}
