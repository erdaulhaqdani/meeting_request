<?php

namespace App\Controllers;

use App\Models\Meeting_requestModel;
use App\Models\KategoriModel;
use App\Models\CustModel;
use App\Models\Tanggapan_MRModel;
use App\Models\PetugasModel;
use App\Models\LevelModel;

class Meeting_request extends BaseController
{
  protected $Meeting_requestModel;
  protected $KategoriModel;
  protected $CustModel;
  protected $Tanggapan_MRModel;
  protected $PetugasModel;
  protected $LevelModel;

  public function __construct()
  {
    $this->Meeting_requestModel = new Meeting_requestModel();
    $this->KategoriModel = new kategoriModel();
    $this->CustModel = new CustModel();
    $this->Tanggapan_MRModel = new Tanggapan_MRModel();
    $this->PetugasModel = new PetugasModel();
    $this->LevelModel = new LevelModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Riwayat Meeting Request',
      'meeting' => $this->Meeting_requestModel->listMeetingRequest(session('idCustomer')),
      'belum' => $this->Meeting_requestModel->jumlahMeetingRequest(session('idCustomer'), 'Belum diproses'),
      'proses' => $this->Meeting_requestModel->jumlahMeetingRequest(session('idCustomer'), 'Sedang diproses'),
      'selesai' => $this->Meeting_requestModel->jumlahMeetingRequest(session('idCustomer'), 'Selesai diproses'),
      'kategori' => $this->KategoriModel->getKategori(),
      'tanggapan' => $this->Tanggapan_MRModel->getTanggapan(),

    ];

    return view('meeting_request/view_meeting_request', $data);
  }

  public function form()
  {
    $data = [
      'title' => 'Form Meeting Request',
      'meeting' => $this->Meeting_requestModel->getMeetingRequest(),
      'validation' => \Config\Services::validation(),
      'kategori' => $this->KategoriModel->getKategori()
    ];

    return view('meeting_request/form_meeting_request', $data);
  }

  public function input()
  {
    if (!$this->validate([
      'lampiran' => [
        'rules' => 'max_size[lampiran,5120]',
        'errors' => [
          'max_size' => 'Ukuran file maksimal 5MB'
        ]
      ]
    ])) {
      $validation =  \Config\Services::validation();
      return redirect()->to('/Meeting_request/form')->withInput()->with('validation', $validation);
    }

    //ambil file
    $lampiran = $this->request->getFile('lampiran');
    if ($lampiran->getError() == 4) {
      $namalampiran = 'default.png';
    } else {
      //ambil nama file
      $namalampiran = $lampiran->getRandomName();
      //pindah file
      $lampiran->move('lampiran_customerMR', $namalampiran);
    }

    $this->Meeting_requestModel->save([
      'Bentuk_layanan' => $this->request->getVar('bentuk_layanan'),
      'Kantor' => $this->request->getVar('kantor'),
      'Perihal' => $this->request->getVar('perihal'),
      'Tanggal_kunjungan' => $this->request->getVar('tanggal_kunjungan'),
      'Waktu_kunjungan' => $this->request->getVar('waktu_kunjungan'),
      'idKategori' => $this->request->getVar('kategori'),
      'Status' => 'Belum diproses',
      'File_lampiran' => $namalampiran,
      'idCustomer' => $this->request->getVar('idCustomer')
    ]);

    session()->setFlashdata('pesan', 'Berhasil menambahkan meeting request.');

    return redirect()->to('/Meeting_request');
  }
  public function detail($id)
  {
    $meeting = $this->Meeting_requestModel->getMeetingRequest($id);
    if ($meeting['Status'] == 'Belum diproses') {
      $data = [
        'title' => 'Detail Meeting Request',
        'meeting' => $meeting,
        'customer' => $this->CustModel->getCustomer($meeting['idCustomer']),
        'kategori' => $this->KategoriModel->getKategori($meeting['idKategori'])
      ];
    } elseif ($meeting['Status'] == 'Selesai diproses') {
      $tanggapan = $this->Tanggapan_MRModel->getTanggapanMeeting($meeting['idMeeting']);
      $petugas = $this->PetugasModel->getPetugasId($tanggapan['idPetugas']);
      $data = [
        'title' => 'Detail Meeting Request',
        'meeting' => $meeting,
        'customer' => $this->CustModel->getCustomer($meeting['idCustomer']),
        'kategori' => $this->KategoriModel->getKategori($meeting['idKategori']),
        'tanggapan' => $tanggapan,
        'petugas' => $petugas,
        'level' => $this->LevelModel->getlevel($petugas['idLevel'])
      ];
    } else {
      $data = [
        'title' => 'Detail Meeting Request',
        'meeting' => $meeting,
        'customer' => $this->CustModel->getCustomer($meeting['idCustomer']),
        'kategori' => $this->KategoriModel->getKategori($meeting['idKategori'])
      ];
    }

    // $data = [
    //   'title' => 'Detail Meeting Reqeust',
    //   'meeting' => $this->Meeting_requestModel->getMeetingRequest($id),
    //   'customer' => $this->CustModel->getCustomer(session('idCustomer')),
    //   'kategori' => $this->KategoriModel->getKategori(),
    //   'tanggapan' => $this->Tanggapan_MRModel->getTanggapan(),
    //   'petugas' => $this->PetugasModel->findAll(),
    // ];

    return view('meeting_request/detail_meeting_request', $data);
  }

  public function cancel($id)
  {
    $this->Meeting_requestModel->save([
      'idMeeting' => $id,
      'Status' => 'Dibatalkan'
    ]);

    session()->setFlashdata('pesan', 'Berhasil membatalkan meeting request.');

    return redirect()->to('/Meeting_request');
  }

  public function delete($id)
  {

    $this->Meeting_requestModel->delete($id);

    session()->setFlashdata('pesan', 'Berhasil menghapus meeting request.');

    return redirect()->to('/Meeting_request');
  }

  public function edit($id)
  {
    $data = [
      'title' => 'Ubah Meeting Request',
      'validation' => \Config\Services::validation(),
      'meeting' => $this->Meeting_requestModel->getMeetingRequest($id),
      'kategori' => $this->KategoriModel->getKategori()
    ];

    return view('meeting_request/edit_meeting_request', $data);
  }

  public function update($id)
  {
    if (!$this->validate([
      'lampiran' => [
        'rules' => 'max_size[lampiran,5120]',
        'errors' => [
          'max_size' => 'Ukuran file maksimal 5MB'
        ]
      ]
    ])) {
      $validation =  \Config\Services::validation();
      return redirect()->to('/Meeting_request/form')->withInput()->with('validation', $validation);
    }

    //ambil file
    $lampiran = $this->request->getFile('lampiran');
    if ($lampiran->getError() == 4) {
      $namalampiran = 'default.png';
    } else {
      //ambil nama file
      $namalampiran = $lampiran->getRandomName();
      //pindah file
      $lampiran->move('lampiran_customerMR', $namalampiran);
    }

    $this->Meeting_requestModel->save([
      'idMeeting' => $id,
      'Bentuk_layanan' => $this->request->getVar('bentuk_layanan'),
      'Kantor' => $this->request->getVar('kantor'),
      'Perihal' => $this->request->getVar('perihal'),
      'Tanggal_kunjungan' => $this->request->getVar('tanggal_kunjungan'),
      'Waktu_kunjungan' => $this->request->getVar('waktu_kunjungan'),
      'idKategori' => $this->request->getVar('kategori'),
      'File_lampiran' => $namalampiran,
      'Status' => 'Belum diproses'
    ]);

    session()->setFlashdata('pesan', 'Berhasil mengubah meeting request.');

    return redirect()->to('/Meeting_request');
  }

  public function rating($id)
  {
    $data = [
      'title' => 'Rating & Ulasan',
      'meeting' => $this->Meeting_requestModel->getMeetingRequest($id),
    ];

    return view('/Meeting_request/rating_meeting_request', $data);
  }

  public function input_rating()
  {
    $this->Meeting_requestModel->save([
      'idMeeting' => $this->request->getVar('idMeeting'),
      'Rating' => $this->request->getVar('rating'),
      'Ulasan' => $this->request->getVar('ulasan')
    ]);

    session()->setFlashdata('pesan', 'Berhasil memberikan rating & ulasan.');

    return redirect()->to('/Meeting_request');
  }

  function getData($myDate)
  {
    $tgl = $myDate;

    $query = $this->Meeting_requestModel->TanggalKunjungan($myDate);

    $data = array();
    foreach ($query->getResult() as $row) {
      $a = array(
        'tgl' => $row->Tanggal_kunjungan,
        'jam' => $row->Waktu_kunjungan,
      );
      array_push($data, $a);
    }

    return json_encode($data);
  }
}
