<?php

namespace App\Models;

use CodeIgniter\Model;

class Landing_pageModel extends Model
{
  protected $table      = 'berita';
  protected $primaryKey = 'id_berita';

  protected $allowedFields = ['Isi', 'Kategori', 'Judul', 'Status', 'Gambar', 'Penulis', 'idPetugas', 'tgl_kegiatan'];

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
      return $this->where(['Kategori' => 'Agenda'])->findAll();
    }

    return $this->where(['id_berita' => $id])->first();
  }

  public function search($pencarian)
  {
    $builder = $this->db->table('berita');
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
    $builder->where('Kategori', 'artikel');
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


  public function listInformasi($id)
  {

    $builder = $this->db->table('berita');
    $builder->where('idPetugas', $id);
    $builder->like('Status', 'Publik');
    $builder->orlike('Status', 'Diarsipkan');
    $builder->orderBy('created_at', 'DESC');
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
}
