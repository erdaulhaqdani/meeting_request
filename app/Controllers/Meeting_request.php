<?php

namespace App\Controllers;

use App\Models\Meeting_requestModel;
use App\Models\KategoriModel;
use App\Models\CustModel;
use App\Models\Tanggapan_MRModel;
use App\Models\PetugasModel;

class Meeting_request extends BaseController
{
  protected $Meeting_requestModel;
  protected $KategoriModel;
  protected $CustModel;
  protected $Tanggapan_MRModel;
  protected $PetugasModel;

  public function __construct()
  {
    $this->Meeting_requestModel = new Meeting_requestModel();
    $this->KategoriModel = new kategoriModel();
    $this->CustModel = new CustModel();
    $this->Tanggapan_MRModel = new Tanggapan_MRModel();
    $this->PetugasModel = new PetugasModel();
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
  // tambah label tiap rules
  {

    $this->Meeting_requestModel->save([
      'Bentuk_layanan' => $this->request->getVar('bentuk_layanan'),
      'Kantor' => $this->request->getVar('kantor'),
      'Perihal' => $this->request->getVar('perihal'),
      'Telepon' => $this->request->getVar('telepon'),
      'Tanggal_kunjungan' => $this->request->getVar('tanggal_kunjungan'),
      'Waktu_kunjungan' => $this->request->getVar('waktu_kunjungan'),
      'idKategori' => $this->request->getVar('kategori'),
      'Status' => 'Belum diproses',
      'idCustomer' => $this->request->getVar('idCustomer')
    ]);

    session()->setFlashdata('pesan', 'Berhasil menambahkan meeting request.');

    return redirect()->to('/Meeting_request/form');
  }
  public function detail($id)
  {
    $data = [
      'title' => 'Detail Meeting Reqeust',
      'meeting' => $this->Meeting_requestModel->getMeetingRequest($id),
      'customer' => $this->CustModel->getCustomer(session('idCustomer')),
      'kategori' => $this->KategoriModel->getKategori(),
      'tanggapan' => $this->Tanggapan_MRModel->getTanggapan(),
      'petugas' => $this->PetugasModel->findAll(),
    ];

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

    session()->setFlashdata('pesan', 'berhasil menghapus meeting request.');

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

    $this->Meeting_requestModel->save([
      'idMeeting' => $id,
      'Bentuk_layanan' => $this->request->getVar('bentuk_layanan'),
      'Kantor' => $this->request->getVar('kantor'),
      'Perihal' => $this->request->getVar('perihal'),
      'Telepon' => $this->request->getVar('telepon'),
      'Tanggal_kunjungan' => $this->request->getVar('tanggal_kunjungan'),
      'Waktu_kunjungan' => $this->request->getVar('waktu_kunjungan'),
      'idKategori' => $this->request->getVar('kategori'),
      'Status' => 'Belum diproses'
    ]);

    session()->setFlashdata('pesan', 'Berhasil mengubah meeting request.');

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
