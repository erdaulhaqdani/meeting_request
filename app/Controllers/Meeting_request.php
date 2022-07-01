<?php

namespace App\Controllers;

use App\Models\Meeting_requestModel;
use App\Models\KategoriModel;
use App\Models\CustModel;
use App\Models\Tanggapan_MRModel;
use App\Models\PetugasModel;
use App\Models\LevelModel;
use PhpParser\Node\Stmt\Echo_;

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
      'title' => 'Daftar Janji Temu',
      'meeting' => $this->Meeting_requestModel->listMeetingRequest(session('idCustomer')),
      'belum' => $this->Meeting_requestModel->jumlahMeetingRequest(session('idCustomer'), 'Belum diproses'),
      'proses' => $this->Meeting_requestModel->jumlahMeetingRequest(session('idCustomer'), 'Sedang diproses'),
      'eskalasi' => $this->Meeting_requestModel->jumlahMeetingRequest(session('idCustomer'), 'Eskalasi'),
      'selesai' => $this->Meeting_requestModel->jumlahMeetingRequest(session('idCustomer'), 'Selesai diproses'),
      'kategori' => $this->KategoriModel->getKategori(),
      'tanggapan' => $this->Tanggapan_MRModel->getTanggapan(),

    ];

    return view('meeting_request/view_meeting_request', $data);
  }

  public function form()
  {
    $data = [
      'title' => 'Form Janji Temu',
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
      'idCustomer' => $this->request->getVar('idCustomer'),
      'notifCustomer' => 0,
      'notifPetugas' => 0
    ]);

    session()->setFlashdata('pesan', 'Berhasil menambahkan Janji Temu.');

    return redirect()->to('/Meeting_request');
  }

  public function detail($id)
  {
    // $meeting = $this->Meeting_requestModel->getMeetingRequest($id);
    // if ($meeting['Status'] == 'Belum diproses') {
    //   $data = [
    //     'title' => 'Detail Janji Temu',
    //     'meeting' => $meeting,
    //     'customer' => $this->CustModel->getCustomer($meeting['idCustomer']),
    //     'kategori' => $this->KategoriModel->getKategori($meeting['idKategori'])
    //   ];
    // } elseif ($meeting['Status'] == 'Selesai diproses') {
    //   $tanggapan = $this->Tanggapan_MRModel->getTanggapanMeeting($id);
    //   $data = [
    //     'title' => 'Detail Janji Temu',
    //     'meeting' => $meeting,
    //     'customer' => $this->CustModel->getCustomer($meeting['idCustomer']),
    //     'kategori' => $this->KategoriModel->getKategori($meeting['idKategori']),
    //     'tanggapan' => $tanggapan,
    //     'petugas' => $this->PetugasModel->getPetugasId(),
    //     'level' => $this->LevelModel->getlevel()
    //   ];
    // } else {
    //   $data = [
    //     'title' => 'Detail Janji Temu',
    //     'meeting' => $meeting,
    //     'customer' => $this->CustModel->getCustomer($meeting['idCustomer']),
    //     'kategori' => $this->KategoriModel->getKategori($meeting['idKategori'])
    //   ];
    // }

    $this->Meeting_requestModel->update(['idMeeting' => $id], ['notifCustomer' => 1]);
    $meeting = $this->Meeting_requestModel->getMeetingRequest($id);
    $tanggapan = $this->Tanggapan_MRModel->trackTanggapanMeeting($id);
    $data = [
      'title' => 'Detail Meeing Request',
      'meeting' => $meeting,
      'customer' => $this->CustModel->getCustomer($meeting['idCustomer']),
      'kategori' => $this->KategoriModel->getKategori($meeting['idKategori']),
      'tanggapan' => $tanggapan,
      'petugas' => $this->PetugasModel->getPetugasId(),
      'level' => $this->LevelModel->getlevel()
    ];

    return view('meeting_request/detail_meeting_request', $data);
  }

  public function cancel($id)
  {
    $this->Meeting_requestModel->save([
      'idMeeting' => $id,
      'Status' => 'Dibatalkan',
      'idCustomer' => 0
    ]);

    session()->setFlashdata('pesan', 'Berhasil membatalkan meeting request.');

    return redirect()->to('/Meeting_request');
  }

  public function delete($id)
  {

    $meeting = $this->Meeting_requestModel->getMeetingRequest($id);
    // hapus file dari direktori
    if ($meeting['File_lampiran'] != 'default.png') {
      //hapus file lampiran bukan default.png
      unlink('lampiran_customerMR/' . $meeting['File_lampiran']);
    }
    $this->Meeting_requestModel->delete($id);

    session()->setFlashdata('pesan', 'Berhasil menghapus Janji Temu.');

    return redirect()->to('/Meeting_request');
  }

  public function edit($id)
  {
    $data = [
      'title' => 'Ubah Janji Temu',
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
      return redirect()->to('/Meeting_request/edit/' . $id . '')->withInput()->with('validation', $validation);
    }


    $lampiran = $this->request->getFile('lampiran');
    $meeting = $this->Meeting_requestModel->getMeetingRequest($id);
    $file_lama = $this->request->getVar('file_lama');

    // hapus file dari direktori
    if ($lampiran != $file_lama) {
      if ($meeting['File_lampiran'] != 'default.png') {
        //hapus file lampiran lama yg bukan default.png
        unlink('lampiran_customerMR/' . $meeting['File_lampiran']);
      }
    }
    //ambil file
    if ($lampiran->getError() == 4) {
      $namalampiran = $file_lama;
    } else {
      //ambil nama file
      $namalampiran = $lampiran . $id;
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
      'Status' => 'Belum diproses',
      'notifCustomer' => 0,
      'notifPetugas' => 0
    ]);

    session()->setFlashdata('pesan', 'Berhasil mengubah Janji Temu');

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

  public function getNotifPetugasMR()
  {
    $query = $this->Meeting_requestModel->notifPetugasMR(session('idPetugas'))->getResultArray();
    $count = $this->Meeting_requestModel->notifPetugasMR(session('idPetugas'))->getNumRows();
    $output = '';

    if ($count > 0) {
      foreach ($query as $row) {
        if ($row['Tiket'] == 'PO') {
          $output .= '
                        <a href="/Pengaduan_online/detail/' . $row['idPengaduan'] . '" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="fas fa-file-alt"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-1">' . $row['Judul'] . '</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1 text-primary">Pengaduan Online</p>
                                        <p class="mb-1">' . $row['Status'] . '</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> ' . $row['updated_at'] . '</p>
                                    </div>
                                </div>
                            </div>   
                        </a>';
        } elseif ($row['Tiket'] == 'MR') {
          $output .= '
                        <a href="/Meeting_request/detail/' . $row['idPengaduan'] . '" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="fas fa-calendar-day"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-1">' . $row['Judul'] . '</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1 text-primary">Meeting Request</p>
                                        <p class="mb-1">' . $row['Status'] . '</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> ' . $row['updated_at'] . '</p>
                                    </div>
                                </div>
                            </div>   
                        </a>';
        }
      }
    } else {
      $output .= '
            <a href="#" class="text-reset notification-item">
                <div class="d-flex">
                    <div class="avatar-xs me-3">
                        <span class="avatar-title bg-danger rounded-circle font-size-16">
                            <i class="fas fa-times"></i>
                        </span>
                    </div>
                    <div class="flex-1">
                        <div class="font-size-12 text-muted">
                            <p class="mt-2">Tidak ada notifikasi terbaru</p>
                        </div>
                    </div>
                </div>';
    }

    $data = array(
      'notification' => $output,
      'unread_notification' => $count
    );

    echo json_encode($data);
  }
}
