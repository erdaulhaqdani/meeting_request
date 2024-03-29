<?php

namespace App\Controllers;

use App\Models\Landing_pageModel;
use App\Models\KategoriModel;
use App\Models\PermohonanInfoModel;
use App\Models\LevelModel;
use App\Models\PetugasModel;
use App\Models\UserModel;
use App\Models\UploadsModel;
use App\Models\GaleriModel;
use App\Models\CustModel;
use App\Models\Meeting_requestModel;
use App\Models\Pengaduan_onlineModel;


class Landing_page extends BaseController
{
  protected $Landing_pageModel;
  protected $KategoriModel;
  protected $PermohonanInfoModel;
  protected $LevelModel;
  protected $PetugasModel;
  protected $UserModel;
  protected $UploadsModel;
  protected $GaleriModel;
  protected $CustModel;
  protected $Meeting_requestModel;
  protected $Pengaduan_onlineModel;

  public function __construct()
  {
    $this->Landing_pageModel = new Landing_pageModel();
    $this->KategoriModel = new kategoriModel();
    $this->PermohonanInfoModel = new PermohonanInfoModel();
    $this->LevelModel = new LevelModel();
    $this->PetugasModel = new PetugasModel();
    $this->UserModel = new UserModel();
    $this->UploadsModel = new UploadsModel();
    $this->GaleriModel = new GaleriModel();
    $this->CustModel = new CustModel();
    $this->Meeting_requestModel = new Meeting_requestModel();
    $this->Pengaduan_onlineModel = new Pengaduan_onlineModel();
  }

  public function form_petugas()
  {
    $data = [
      'title' => 'Tambah Petugas',
      'level' => $this->LevelModel->findAll(),
      'level_petugas' => $this->LevelModel->levelPetugas(),
      'kategori' => $this->KategoriModel->findAll(),
      'validation' => \Config\Services::validation()
    ];
    return view('landing_page/form_petugas', $data);
  }

  public function input_petugas()
  // tambah label tiap rules
  {
    $hashedPassword = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

    $this->PetugasModel->save([
      'idLevel' => $this->request->getVar('level'),
      'Kantor' => $this->request->getVar('kantor'),
      'Nama' => $this->request->getVar('nama'),
      'NIP' => $this->request->getVar('nip'),
      'Unit' => $this->request->getVar('unit'),
      // 'Email' => $this->request->getVar('email'),
      // 'Password' => $hashedPassword,

    ]);

    // $this->UserModel->save([
    //   'Email' => $this->request->getVar('email'),
    //   'Password' => $hashedPassword,
    //   'idLevel' => $this->request->getVar('level')
    // ]);

    session()->setFlashdata('pesan', 'Berhasil menambahkan petugas.');

    return redirect()->to('/Landing_page/daftar_petugas');
  }

  public function daftar_customer()
  {
    $data = [
      'title' => 'Daftar Customer',
      'customer' => $this->CustModel->findAll(),
      'validation' => \Config\Services::validation(),
    ];
    return view('landing_page/daftar_customer', $data);
  }

  public function detail_customer($id)
  {
    $data = [
      'title' => 'Detail Akun Customer',
      'customer' => $this->CustModel->getCustomer($id),
      'meeting' => $this->Meeting_requestModel->jumlah_meetingCustomer($id),
      'pengaduan' => $this->Pengaduan_onlineModel->jumlah_pengaduanCustomer($id)
    ];
    return view('landing_page/detail_customer', $data);
  }

  public function daftar_petugas()
  {
    $data = [
      'title' => 'Daftar Petugas',
      'level' => $this->LevelModel->findAll(),
      'petugas' => $this->PetugasModel->where(['idLevel !=' => 1, 'idPetugas !=' => 1,])->find(),
      'level_petugas' => $this->LevelModel->findAll(),
      'validation' => \Config\Services::validation()
    ];
    return view('landing_page/daftar_petugas', $data);
  }

  public function edit_petugas($email)
  {
    $data = [
      'title' => 'Ubah Data Petugas',
      'level' => $this->LevelModel->levelPetugas(),
      'petugas' => $this->PetugasModel->getPetugas($email),
      'validation' => \Config\Services::validation()
    ];
    return view('landing_page/edit_petugas', $data);
  }

  public function detail_petugas($email)
  {
    $data = [
      'title' => 'Detail Data Petugas',
      'level' => $this->LevelModel->findAll(),
      'petugas' => $this->PetugasModel->getPetugas($email),
      'kategori' => $this->KategoriModel->findAll(),
    ];
    return view('landing_page/detail_petugas', $data);
  }

  public function update_petugas($email)
  // tambah label tiap rules
  {
    $email = $this->request->getVar('email');
    $level = $this->request->getVar('level');
    $petugas = $this->UserModel->getUser($email);

    $this->UserModel->update(['idUser' => $petugas[0]['idUser']], ['idLevel' => $level]);

    $this->PetugasModel->save([
      'idPetugas' => $this->request->getVar('idPetugas'),
      'idLevel' => $this->request->getVar('level'),
      'Kantor' => $this->request->getVar('kantor'),
      'Nama' => $this->request->getVar('nama'),
      'NIP' => $this->request->getVar('nip'),
      'Unit' => $this->request->getVar('unit'),
    ]);

    session()->setFlashdata('pesan', 'Berhasil mengubah data petugas.');

    return redirect()->to('/Landing_page/daftar_petugas');
  }

  public function editPermohonan($id)
  {
    $data = [
      'title' => 'Permohonan Informasi',
      'info' => $this->PermohonanInfoModel->getPermohonanInfo($id),
      'validation' => \Config\Services::validation()
    ];

    return view('/landing_page/edit_permohonan_info', $data);
  }

  public function updatePermohonan($id)
  {

    $this->PermohonanInfoModel->save([
      'idPermohonan' => $id,
      'Isi' => $this->request->getVar('isi_permohonan'),
    ]);

    session()->setFlashdata('pesan', 'Berhasil mengubah prosedur permohonan informasi.');

    return redirect()->to('/Landing_page/permohonanInfo/' . session('idPetugas'));
  }

  public function verifikasiAkun($id)
  {

    $this->CustModel->save([
      'idCustomer' => $id,
      'StatusAkun' => 'Terverifikasi',
    ]);

    session()->setFlashdata('pesan', 'Berhasil memverifikasi akun.');

    return redirect()->to('/daftar_customer');
  }

  public function viewPermohonan()
  {
    $data = [
      'title' => 'Permohonan Informasi',
      'info' => $this->PermohonanInfoModel->findAll()
    ];

    return view('pages/permohonan_info', $data);
  }

  public function index()
  {
    $data = [
      'title' => 'Daftar Informasi',
      'publik' => $this->Landing_pageModel->jumlahInformasiPublik(session('id_berita')),
      'arsip' => $this->Landing_pageModel->jumlahInformasiArsip(session('id_berita')),
      'kategori' => $this->KategoriModel->getKategori(),
      'informasi' => $this->Landing_pageModel->listInformasi(session('idPetugas')),

    ];

    return view('landing_page/view_berita', $data);
  }

  public function form()
  {
    session();
    $data = [
      'title' => 'Tambah Informasi',
      'berita' => $this->Landing_pageModel->getInformasi(),
      'validation' => \Config\Services::validation(),
      'kategori' => $this->KategoriModel->getKategori()
    ];

    return view('landing_page/form_berita', $data);
  }

  public function input()
  {
    $val = $this->validate(
      [
        'gambar' => [
          'rules' => 'max_size[gambar,3072]|ext_in[gambar,jpg,jpeg,png]',
          'errors' => [
            'max_size' => 'Ukuran file gambar maksimal 3MB',
            'ext_in' => 'Jenis file harus jpg atau png'
          ]
        ],
        'gambar_lampiran[]' => [
          'rules' => 'max_size[gambar,3072]|ext_in[gambar,jpg,jpeg,png]',
          'errors' => [
            'max_size' => 'Ukuran file gambar maksimal 3MB',
            'ext_in' => 'Jenis file harus jpg atau png'
          ]
        ]
      ]

    );
    if (!$val) {
      $validation = \Config\Services::validation();
      return redirect()->to('Landing_page/form')->withInput()->with('validation', $validation);
    }

    //ambil file
    $gambar = $this->request->getFile('gambar');
    if ($gambar->getError() == 4) {
      $namagambar = 'default.png';
    } else {
      //ambil nama file
      $namagambar = $gambar->getRandomName();
      //pindah file ke folder gambar
      $gambar->move('gambar', $namagambar);
    }

    $gambar_lampiran = $this->request->getFiles();
    $gambar_lamp = $gambar_lampiran['gambar_lampiran'][0];

    if ($gambar_lamp->getError() == 4) {
      $random_id = 0;
    } else {
      $random_id = rand(000, 999);

      $data_uploads = [
        'id_uploads' => $random_id,
        'Judul' => $this->request->getVar('judul'),
        'Kategori' => 'Gambar Lampiran Informasi'
      ];
      $this->UploadsModel->insert_upload($data_uploads);

      foreach ($gambar_lampiran['gambar_lampiran'] as $key => $img) {
        $imgName = $img->getRandomName();
        $data_galeri = [
          'id_uploads' => $random_id,
          'File' => $imgName,
        ];
        $this->UploadsModel->insert_galeri($data_galeri);
        $img->move(ROOTPATH . 'public/uploads', $imgName);
      }
    }

    $this->Landing_pageModel->save([
      'Isi' => $this->request->getVar('isi_berita'),
      'Judul' => $this->request->getVar('judul'),
      'Kategori' => $this->request->getVar('kategori_informasi'),
      'Penulis' => $this->request->getVar('penulis'),
      'Gambar' => $namagambar,
      'Status' => 'Diarsipkan',
      'idPetugas' => $this->request->getVar('idPetugas'),
      'id_uploads'  => $random_id
    ]);

    session()->setFlashdata('pesan', 'Berhasil menambahkan Informasi.');

    return redirect()->to('/Landing_page');
  }

  public function delete($id)
  {

    $informasi =  $this->Landing_pageModel->getInformasi($id);
    $galeri = $this->GaleriModel->getGambar($informasi['id_uploads']);

    // hapus gambar cover dari direktori
    unlink('gambar/' . $informasi['Gambar']);

    $this->Landing_pageModel->delete($id);

    session()->setFlashdata('pesan', 'Berhasil menghapus Informasi');

    return redirect()->to('/Landing_page');
  }

  public function publik($id)
  {
    $this->Landing_pageModel->save([
      'id_berita' => $id,
      'Status' => 'Publik'
    ]);

    session()->setFlashdata('pesan', 'Berhasil mempublikasikan Informasi.');

    return redirect()->to('/Landing_page');
  }

  public function publik_dashboard($id)
  {
    $this->Landing_pageModel->save([
      'id_berita' => $id,
      'Status' => 'Publik'
    ]);

    session()->setFlashdata('pesan', 'Berhasil mempublikasikan Informasi.');

    return redirect()->to('/dashboard_admin_landing');
  }

  public function arsip($id)
  {

    $this->Landing_pageModel->save([
      'id_berita' => $id,
      'Status' => 'Diarsipkan'
    ]);

    session()->setFlashdata('pesan', 'Berhasil mengarsipkan Informasi.');

    return redirect()->to('/Landing_page');
  }

  public function arsip_dashboard($id)
  {

    $this->Landing_pageModel->save([
      'id_berita' => $id,
      'Status' => 'Diarsipkan'
    ]);

    session()->setFlashdata('pesan', 'Berhasil mengarsipkan Informasi.');

    return redirect()->to('/dashboard_admin_landing');
  }

  public function edit($id)
  {
    $data = [
      'title' => 'Ubah Informasi',
      'validation' => \Config\Services::validation(),
      'informasi' => $this->Landing_pageModel->getInformasi($id),
      'kategori' => $this->KategoriModel->getKategori(),
      'uploads' => $this->UploadsModel->findAll(),
      'GambarLampiran' => $this->GaleriModel->findAll(),
    ];

    return view('landing_page/edit_berita', $data);
  }

  public function update($id)
  {

    $val = $this->validate(
      [
        'gambar' => [
          'rules' => 'max_size[gambar,3072]|ext_in[gambar,jpg,jpeg,png]',
          'errors' => [
            'max_size' => 'Ukuran file gambar maksimal 3MB',
            'ext_in' => 'Jenis file harus jpg atau png'
          ]
        ]
      ]

    );
    if (!$val) {
      $validation = \Config\Services::validation();
      return redirect()->to('/Landing_page/edit')->withInput()->with('validation', $validation);
    }

    //ambil file
    $gambar = $this->request->getFile('gambar');
    if ($gambar->getError() == 4) {
      $namagambar = $this->request->getVar('gambar_lama');
    } else {
      //ambil nama file
      $namagambar = $gambar->getRandomName();
      //pindah file ke folder gambar
      $gambar->move('gambar', $namagambar);
    }

    $gambar_lampiran = $this->request->getFiles();
    $gambar_lamp = $gambar_lampiran['gambar_lampiran'][0];

    if ($gambar_lamp->getError() == 4) {
      $random_id  = $this->request->getVar('lampiran_lama');
    } else {
      $random_id = rand(000, 999);

      $data_uploads = [
        'id_uploads' => $random_id,
        'Judul' => $this->request->getVar('judul'),
        'Kategori' => 'Gambar Lampiran Informasi'
      ];
      $this->UploadsModel->insert_upload($data_uploads);

      foreach ($gambar_lampiran['gambar_lampiran'] as $key => $img) {
        $imgName = $img->getRandomName();
        $data_galeri = [
          'id_uploads' => $random_id,
          'File' => $imgName,
        ];
        $this->UploadsModel->insert_galeri($data_galeri);
        $img->move(ROOTPATH . 'public/uploads', $imgName);
      }
    }

    $this->Landing_pageModel->save([
      'id_berita' => $id,
      'Isi' => $this->request->getVar('isi_berita'),
      'Judul' => $this->request->getVar('judul'),
      'Kategori' => $this->request->getVar('kategori_informasi'),
      'Penulis' => $this->request->getVar('penulis'),
      'Status' => $this->request->getVar('status'),
      'Gambar' => $namagambar,
      'idPetugas' => $this->request->getVar('idPetugas'),
      'id_uploads'  => $random_id
    ]);

    session()->setFlashdata('pesan', 'Berhasil mengubah Informasi.');

    return redirect()->to('/Landing_page');
  }

  public function hapus_gambar($id)
  {
    // Error
    // $informasi =  $this->Landing_pageModel->getInfoByIdUploads($id);

    $this->UploadsModel->delete($id);

    session()->setFlashdata('pesan', 'Berhasil menghapus meeting request.');

    return redirect()->to('Landing_page');
  }

  // Kelola Agenda
  public function daftar_agenda()
  {
    $data = [
      'title' => 'Daftar Agenda',
      'agenda' => $this->Landing_pageModel->getAgenda(),
    ];

    return view('landing_page/daftar_agenda', $data);
  }

  public function form_agenda()
  {
    $data = [
      'title' => 'Form Agenda',
      'validation' => \Config\Services::validation(),
      'penulis' => session('Nama')
    ];
    return view('landing_page/form_agenda', $data);
  }

  public function input_agenda()
  {
    $val = $this->validate(
      [
        'gambar' => [
          'rules' => 'max_size[gambar,3072]|ext_in[gambar,jpg,jpeg,png]',
          'errors' => [
            'max_size' => 'Ukuran file gambar maksimal 3MB',
            'ext_in' => 'Jenis file harus jpg atau png'
          ]
        ],
        'gambar_lampiran[]' => [
          'rules' => 'max_size[gambar,3072]|ext_in[gambar,jpg,jpeg,png]',
          'errors' => [
            'max_size' => 'Ukuran file gambar maksimal 3MB',
            'ext_in' => 'Jenis file harus jpg atau png'
          ]
        ]
      ]

    );
    if (!$val) {
      $validation = \Config\Services::validation();
      return redirect()->to('/Landing_page/form_agenda')->withInput()->with('validation', $validation);
    }

    //ambil file
    $gambar = $this->request->getFile('gambar');
    if ($gambar->getError() == 4) {
      $namagambar = 'default.png';
    } else {
      //ambil nama file
      $namagambar = $gambar->getRandomName();
      //pindah file ke folder gambar
      $gambar->move('gambar_agenda', $namagambar);
    }

    $gambar_lampiran = $this->request->getFiles();
    $gambar_lamp = $gambar_lampiran['gambar_lampiran'][0];

    if ($gambar_lamp->getError() == 4) {
      $random_id = 0;
    } else {
      $random_id = rand(000, 999);

      $data_uploads = [
        'id_uploads' => $random_id,
        'Judul' => $this->request->getVar('judul'),
        'Kategori' => 'Gambar Lampiran Agenda'
      ];
      $this->UploadsModel->insert_upload($data_uploads);

      foreach ($gambar_lampiran['gambar_lampiran'] as $key => $img) {
        $imgName = $img->getRandomName();
        $data_galeri = [
          'id_uploads' => $random_id,
          'File' => $imgName,
        ];
        $this->UploadsModel->insert_galeri($data_galeri);
        $img->move(ROOTPATH . 'public/uploads', $imgName);
      }
    }

    $this->Landing_pageModel->save([
      'Judul' => $this->request->getVar('judul'),
      'Kategori' => 'Agenda',
      'tgl_kegiatan' => $this->request->getVar('tgl'),
      'Isi' => $this->request->getVar('isi_agenda'),
      'Penulis' => $this->request->getVar('penulis'),
      'Gambar' => $namagambar,
      'Status' => 'Diarsipkan',
      'idPetugas' => session('idPetugas'),
      'id_uploads'  => $random_id
    ]);

    session()->setFlashdata('pesan', 'Berhasil menambahkan agenda.');

    return redirect()->to('/Landing_page/daftar_agenda');
  }

  public function delete_agenda($id)
  {

    $informasi =  $this->Landing_pageModel->getInformasi($id);
    $galeri = $this->GaleriModel->getGambar($informasi['id_uploads']);

    // hapus gambar cover dari direktori
    unlink('gambar_agenda/' . $informasi['Gambar']);

    $this->Landing_pageModel->delete($id);

    session()->setFlashdata('pesan', 'Berhasil menghapus Agenda');

    return redirect()->to('/Landing_page/daftar_agenda');
  }

  public function edit_agenda($id)
  {
    $data = [
      'title' => 'Edit Agenda',
      'validation' => \Config\Services::validation(),
      'agenda' => $this->Landing_pageModel->getAgenda($id),
      'uploads' => $this->UploadsModel->findAll(),
      'GambarLampiran' => $this->GaleriModel->findAll(),
    ];
    return view('landing_page/edit_agenda', $data);
  }

  public function update_agenda($id)
  {
    $val = $this->validate(
      [
        'gambar' => [
          'rules' => 'max_size[gambar,3072]|ext_in[gambar,jpg,jpeg,png]',
          'errors' => [
            'max_size' => 'Ukuran file gambar maksimal 3MB',
            'ext_in' => 'Jenis file harus jpg atau png'
          ]
        ],
        'gambar_lampiran[]' => [
          'rules' => 'max_size[gambar,3072]|ext_in[gambar,jpg,jpeg,png]',
          'errors' => [
            'max_size' => 'Ukuran file gambar maksimal 3MB',
            'ext_in' => 'Jenis file harus jpg atau png'
          ]
        ]
      ]

    );
    if (!$val) {
      $validation = \Config\Services::validation();
      return redirect()->to('/Landing_page/edit_agenda')->withInput()->with('validation', $validation);
    }

    $agenda = $this->Landing_pageModel->find($id);
    $gambar_lama = $this->request->getVar('gambar_lama');
    $gambar = $this->request->getFile('gambar');

    // hapus file dari direktori
    // if ($gambar != $gambar_lama) {
    //   if ($agenda['Gambar'] != 'default.png')
    //     //hapus file lampiran lama yg bukan default.png
    //     unlink('gambar_agenda/' . $agenda['Gambar']);
    // }

    //ambil file
    if ($gambar->getError() == 4) {
      $namagambar = $gambar_lama;
    } else {
      //ambil nama file
      $namagambar = $gambar->getRandomName();
      //pindah file ke folder gambar
      $gambar->move('gambar_agenda', $namagambar);
    }

    $gambar_lampiran = $this->request->getFiles();
    $gambar_lamp = $gambar_lampiran['gambar_lampiran'][0];

    if ($gambar_lamp->getError() == 4) {
      $random_id  = $this->request->getVar('lampiran_lama');
    } else {
      $random_id = rand(000, 999);

      $data_uploads = [
        'id_uploads' => $random_id,
        'Judul' => $this->request->getVar('judul'),
        'Kategori' => 'Gambar Lampiran Informasi'
      ];
      $this->UploadsModel->insert_upload($data_uploads);

      foreach ($gambar_lampiran['gambar_lampiran'] as $key => $img) {
        $imgName = $img->getRandomName();
        $data_galeri = [
          'id_uploads' => $random_id,
          'File' => $imgName,
        ];
        $this->UploadsModel->insert_galeri($data_galeri);
        $img->move(ROOTPATH . 'public/uploads', $imgName);
      }
    }

    $this->Landing_pageModel->save([
      'id_berita' => $id,
      'Judul' => $this->request->getVar('judul'),
      'tgl_kegiatan' => $this->request->getVar('tgl'),
      'Isi' => $this->request->getVar('isi_agenda'),
      'Penulis' => $this->request->getVar('penulis'),
      'Gambar' => $namagambar,
      'idPetugas' => session('idPetugas'),
      'id_uploads'  => $random_id
    ]);

    session()->setFlashdata('pesan', 'Berhasil mengubah agenda.');

    return redirect()->to('/Landing_page/daftar_agenda');
  }

  public function arsip_agenda($id)
  {
    $this->Landing_pageModel->save([
      'id_berita' => $id,
      'Status' => 'Diarsipkan'
    ]);

    session()->setFlashdata('pesan', 'Berhasil mengarsipkan agenda.');

    return redirect()->to('/Landing_page/daftar_agenda');
  }

  public function publik_agenda($id)
  {
    $this->Landing_pageModel->save([
      'id_berita' => $id,
      'Status' => 'Publik'
    ]);

    session()->setFlashdata('pesan', 'Berhasil mempublikasikan Informasi.');

    return redirect()->to('/Landing_page/daftar_agenda');
  }

  public function artikel_grid()
  {

    $data = [
      'title' => 'Artikel KPKNL Bandung',
      'berita' => $this->Landing_pageModel->where('Kategori', 'Artikel')->where('Status', 'Publik')->orderBy('created_at', 'DESC')->paginate(6),
      'pager' => $this->Landing_pageModel->pager
    ];

    return view('pages/artikel_grid', $data);
  }

  public function detail_artikel($id)
  {
    $data = [
      'title' => 'Artikel KPKNL Bandung',
      'berita' => $this->Landing_pageModel->getInformasi($id),
      'artikel' => $this->Landing_pageModel->listArtikel($id),
      'uploads' => $this->UploadsModel->findAll(),
      'GambarLampiran' => $this->GaleriModel->findAll(),
    ];

    return view('pages/detail_artikel', $data);
  }

  public function berita_grid()
  {

    $data = [
      'title' => 'Berita KPKNL Bandung',
      'berita' => $this->Landing_pageModel->where('Kategori', 'Berita')->where('Status', 'Publik')->orderBy('created_at', 'DESC')->paginate(6),
      'pager' => $this->Landing_pageModel->pager
    ];

    return view('pages/berita_grid', $data);
  }

  public function detail_berita($id)
  {
    $data = [
      'title' => 'Berita KPKNL Bandung',
      'berita' => $this->Landing_pageModel->getInformasi($id),
      'berita_lain' => $this->Landing_pageModel->listBerita($id),
      'uploads' => $this->UploadsModel->findAll(),
      'GambarLampiran' => $this->GaleriModel->findAll(),
    ];

    return view('pages/detail_berita', $data);
  }

  public function pengumuman_grid()
  {
    $data = [
      'title' => 'Pengumuman KPKNL Bandung',
      'berita' => $this->Landing_pageModel->where('Kategori', 'Pengumuman')->where('Status', 'Publik')->orderBy('created_at', 'DESC')->paginate(6),
      'pager' => $this->Landing_pageModel->pager
    ];

    return view('pages/pengumuman_grid', $data);
  }

  public function detail_pengumuman($id)
  {
    $data = [
      'title' => 'Pengumuman KPKNL Bandung',
      'berita' => $this->Landing_pageModel->getInformasi($id),
      'pengumuman_lain' => $this->Landing_pageModel->listPengumuman($id),
      'uploads' => $this->UploadsModel->findAll(),
      'GambarLampiran' => $this->GaleriModel->findAll(),
    ];

    return view('pages/detail_pengumuman', $data);
  }

  public function peristiwa_grid()
  {
    $data = [
      'title' => 'Peristiwa KPKNL Bandung',
      'berita' => $this->Landing_pageModel->where('Kategori', 'Kilas Peristiwa')->where('Status', 'Publik')->orderBy('created_at', 'DESC')->paginate(6),
      'pager' => $this->Landing_pageModel->pager
    ];

    return view('pages/peristiwa_grid', $data);
  }

  public function detail_peristiwa($id)
  {
    $data = [
      'title' => 'Peristiwa KPKNL Bandung',
      'berita' => $this->Landing_pageModel->getInformasi($id),
      'peristiwa' => $this->Landing_pageModel->listPeristiwa($id),
      'uploads' => $this->UploadsModel->findAll(),
      'GambarLampiran' => $this->GaleriModel->findAll(),
    ];

    return view('pages/detail_peristiwa', $data);
  }

  public function agenda_grid()
  {

    $data = [
      'title' => 'Agenda KPKNL Bandung',
      'berita' => $this->Landing_pageModel->where('Status', 'Publik')->where('Kategori', 'Agenda')->orderBy('created_at', 'DESC')->paginate(6),
      'pager' => $this->Landing_pageModel->pager
    ];

    return view('pages/agenda_grid', $data);
  }

  public function detail_agenda($id)
  {
    $data = [
      'title' => 'Agenda KPKNL Bandung',
      'berita' => $this->Landing_pageModel->getInformasi($id),
      'agenda_lain' => $this->Landing_pageModel->listAgenda($id),
      'uploads' => $this->UploadsModel->findAll(),
      'GambarLampiran' => $this->GaleriModel->findAll(),
    ];

    return view('pages/detail_agenda', $data);
  }

  public function downloadPI($id)
  {

    if ($id == 1) {
      return $this->response->download('permohonan_info/FORM PERMOHONAN PPID TK I.pdf', null);
    } else if ($id == 2) {
      return $this->response->download('permohonan_info/FORM PERMOHONAN PPID TK II.pdf', null);
    } else if ($id == 3) {
      return $this->response->download('permohonan_info/FORM PERMOHONAN PPID TK III.pdf', null);
    }
  }
  public function downloadKI($id)
  {
    if ($id == 1) {
      return $this->response->download('permohonan_info/FORM KEBERATAN PPID TK I.pdf', null);
    } else if ($id == 2) {
      return $this->response->download('permohonan_info/FORM KEBERATAN PPID TK II.pdf', null);
    } else if ($id == 3) {
      return $this->response->download('permohonan_info/FORM KEBERATAN PPID TK III.pdf', null);
    }
  }
}
