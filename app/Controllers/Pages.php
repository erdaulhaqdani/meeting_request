<?php

namespace App\Controllers;

use App\Models\Landing_pageModel;
use App\Models\KategoriModel;

class Pages extends BaseController
{

  protected $Landing_pageModel;
  protected $KategoriModel;

  public function __construct()
  {
    $this->Landing_pageModel = new Landing_pageModel();
    $this->KategoriModel = new kategoriModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Landing Page DJKN Bandung',
      'berita_terbaru' => $this->Landing_pageModel->listBeritaTerbaru(),
      'jumbotron' => $this->Landing_pageModel->jumbotron(),
      'peristiwa_terbaru' => $this->Landing_pageModel->listPeristiwaTerbaru(),
      'artikel_terbaru' => $this->Landing_pageModel->listArtikelTerbaru(),
      'pengumuman_terbaru' => $this->Landing_pageModel->listPengumumanTerbaru(),
    ];
    return view('pages/index', $data);
  }

  public function pencarian()
  {
    $pencarian = $this->request->getVar('pencarian');

    $data = [
      'title' => 'Pencarian KPKNL Bandung',
      'berita' => $this->Landing_pageModel->where('Status', 'Publik')->like('Isi', $pencarian)->orlike('Judul', $pencarian)->paginate(6),
      'pager' => $this->Landing_pageModel->pager
    ];

    return view('pages/pencarian_grid', $data);
  }

  public function detail_pencarian($id)
  {

    $data = [
      'title' => 'Blog KPKNL Bandung',
      'berita' => $this->Landing_pageModel->getInformasi($id),
      'berita_lain' => $this->Landing_pageModel->listArtikelTerbaru(),
    ];

    return view('pages/detail_pencarian', $data);
  }

  public function profil()
  {
    $data = [
      'title' => 'Profil DJKN Bandung'
    ];
    return view('pages/profil', $data);
  }

  public function faq()
  {
    $data = [
      'title' => 'FAQ DJKN Bandung'
    ];
    return view('pages/faq', $data);
  }

  public function permohonan_info()
  {
    $data = [
      'title' => 'Permohonan Informasi DJKN Bandung'
    ];
    return view('pages/permohonan_info', $data);
  }
}
