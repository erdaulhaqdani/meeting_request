<?php

namespace App\Models;

use CodeIgniter\Model;

class Landing_pageModel extends Model
{
  protected $table      = 'berita';
  protected $primaryKey = 'id_berita';

  protected $allowedFields = ['Isi', 'Kategori', 'Judul', 'Status', 'Gambar', 'Penulis', 'idPetugas', 'tgl_kegiatan', 'id_uploads'];

  protected $useAutoIncrement = true;
  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';

  public function getInformasi($id = false)
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id_berita' => $id])->first();
  }

  public function getAgenda($id = false)
  {
    if ($id == false) {
      return $this->where(['Kategori' => 'Agenda'])->orderBy('created_at', 'DESC')->findAll();
    }

    return $this->where(['id_berita' => $id])->first();
  }

  public function listInformasi($id)
  {
    $builder = $this->db->table('berita');
    $builder->where('idPetugas', $id);
    $builder->where('Kategori!=', 'Agenda');
    $builder->orderBy('created_at', 'DESC');
    $query = $builder->get();
    return $query;
  }

  public function search($pencarian)
  {
    $builder = $this->db->table('berita');
    $builder->where('Status', 'Publik');
    $builder->like('Judul', $pencarian);
    $builder->like('Isi', $pencarian);
    return $builder;
  }

  public function jumbotron()
  {
    $builder = $this->db->table('berita');
    $builder->where('Kategori', 'Berita');
    $builder->where('Status', 'Publik');
    $builder->orderBy('created_at', 'desc');
    $query = $builder->get(3, 0);
    return $query;
  }

  public function listArtikelTerbaru()
  {

    $builder = $this->db->table('berita');
    $builder->where('Kategori', 'Artikel');
    $builder->where('Status', 'Publik');
    $builder->orderBy('created_at', 'desc');
    $query = $builder->get(6, 0);
    return $query;
  }

  public function listPengumumanTerbaru()
  {

    $builder = $this->db->table('berita');
    $builder->where('Kategori', 'Pengumuman');
    $builder->where('Status', 'Publik');
    $builder->orderBy('created_at', 'desc');
    $query = $builder->get(6, 0);
    return $query;
  }

  public function listBeritaTerbaru()
  {

    $builder = $this->db->table('berita');
    $builder->where('Kategori', 'Berita');
    $builder->where('Status', 'Publik');
    $builder->orderBy('created_at', 'desc');
    $query = $builder->get(6, 0);
    return $query;
  }

  public function listPeristiwaTerbaru()
  {

    $builder = $this->db->table('berita');
    $builder->where('Kategori', 'Kilas Peristiwa');
    $builder->where('Status', 'Publik');
    $builder->orderBy('created_at', 'desc');
    $query = $builder->get(9, 0);
    return $query;
  }

  public function listBerita($id)
  {

    $builder = $this->db->table('berita');
    $builder->where('Kategori', 'Berita');
    $builder->where('Status', 'Publik');
    $builder->notlike('id_berita', $id);
    $builder->orderBy('created_at', 'desc');
    $query = $builder->get();
    return $query;
  }

  public function listArtikel($id)
  {

    $builder = $this->db->table('berita');
    $builder->where('Kategori', 'Artikel');
    $builder->where('Status', 'Publik');
    $builder->notlike('id_berita', $id);
    $builder->orderBy('created_at', 'desc');
    $query = $builder->get();
    return $query;
  }

  public function listPengumuman($id)
  {

    $builder = $this->db->table('berita');
    $builder->where('Kategori', 'Pengumuman');
    $builder->where('Status', 'Publik');
    $builder->notlike('id_berita', $id);
    $builder->orderBy('created_at', 'desc');
    $query = $builder->get();
    return $query;
  }

  public function listPeristiwa($id)
  {

    $builder = $this->db->table('berita');
    $builder->where('Kategori', 'Kilas Peristiwa');
    $builder->where('Status', 'Publik');
    $builder->notlike('id_berita', $id);
    $builder->orderBy('created_at', 'desc');
    $query = $builder->get();
    return $query;
  }

  public function listAgenda($id)
  {

    $builder = $this->db->table('berita');
    $builder->where('Kategori', 'Agenda');
    $builder->where('Status', 'Publik');
    $builder->notlike('id_berita', $id);
    $builder->orderBy('created_at', 'desc');
    $query = $builder->get();
    return $query;
  }

  public function listInfoLain($id, $kategori)
  {

    $builder = $this->db->table('berita');
    $builder->where('Kategori', $kategori);
    $builder->where('Status', 'Publik');
    $builder->notlike('id_berita', $id);
    $builder->orderBy('created_at', 'desc');
    $query = $builder->get();
    return $query;
  }

  public function jumlahInformasiPublik($id)
  {

    $builder = $this->db->table('berita');
    $builder->where('id_berita', $id);
    $builder->like('Status', 'Publik');
    $builder->selectCount('id_berita');
    $query = $builder->get();
    return $query;
  }

  public function jumlahInformasiArsip($id)
  {

    $builder = $this->db->table('berita');
    $builder->where('id_berita', $id);
    $builder->orlike('Status', 'Diarsipkan');
    $builder->selectCount('id_berita');
    $query = $builder->get();
    return $query;
  }

  public function groupByStatusAgenda($idPetugas)
  {
    $builder = $this->db->table('berita');
    $builder->selectCount('id_berita', 'Jumlah');
    $builder->select('Status');
    $builder->where('idPetugas', $idPetugas);
    $builder->where('Kategori', 'Agenda');
    $builder->groupBy('Status');
    $query = $builder->get();
    return $query;
  }

  public function groupByKategoriInfo($idPetugas)
  {
    $builder = $this->db->table('berita');
    $builder->selectCount('id_berita', 'Jumlah');
    $builder->select('Kategori');
    $builder->where('idPetugas', $idPetugas);
    $builder->where('Kategori !=', 'Agenda');
    $builder->where('Status', 'Publik');
    $builder->groupBy('Kategori');
    $query = $builder->get();
    return $query;
  }

  public function getInfoByIdUploads($id = false)
  {
    $builder = $this->db->table('berita');
    $builder->where('idUploads', $id);
    $query = $builder->get();
    return $query;
  }

  public function lastBerita($id)
  {
    $builder = $this->db->table('berita');
    $builder->where('idPetugas', $id);
    $builder->where('Kategori!=', 'Agenda');
    $builder->orderBy('created_at', 'DESC');
    $query = $builder->get(5, 0);
    return $query;
  }
}
