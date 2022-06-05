<?php

namespace App\Models;

use CodeIgniter\Model;

class Landing_pageModel extends Model
{
  protected $table      = 'berita';
  protected $primaryKey = 'id_berita';

  protected $allowedFields = ['Isi', 'Kategori', 'Judul', 'Status', 'Gambar', 'Penulis'];

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
    $query = $builder->get(9, 0);
    return $query;
  }

  public function listBeritaTerbaru()
  {

    $builder = $this->db->table('berita');
    $builder->where('Kategori', 'Berita');
    $builder->where('Status', 'Publik');
    $builder->orderBy('created_at', 'desc');
    $query = $builder->get(9, 0);
    return $query;
  }

  public function listPeristiwaTerbaru()
  {

    $builder = $this->db->table('berita');
    $builder->where('Kategori', 'peristiwa');
    $builder->where('Status', 'Publik');
    $builder->orderBy('created_at', 'desc');
    $query = $builder->get(9, 0);
    return $query;
  }

  public function listPengumuman()
  {

    $builder = $this->db->table('berita');
    $builder->where('Kategori', 'pengumuman');
    $query = $builder->get();
    return $query;
  }


  public function listInformasi()
  {

    $builder = $this->db->table('berita');
    $builder->like('Status', 'Publik');
    $builder->orlike('Status', 'Diarsipkan');
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
