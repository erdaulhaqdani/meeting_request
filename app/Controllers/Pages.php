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
      'berita' => $this->Landing_pageModel->listBerita(),
      'pengumuman' => $this->Landing_pageModel->listPengumuman(),
      'peristiwa' => $this->Landing_pageModel->listPeristiwa(),
      'artikel' => $this->Landing_pageModel->listArtikel(),
    ];
    return view('pages/index', $data);
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
