<?php

namespace App\Controllers;

use App\Models\Pengaduan_onlineModel;
use App\Models\Meeting_requestModel;
use App\Models\KategoriModel;
use App\Models\CustModel;
use App\Models\PetugasModel;
use App\Models\PegawaiModel;
use App\Models\Landing_pageModel;
use App\Models\TandaTerimaModel;
use FontLib\Table\Type\post;

class Backend extends BaseController
{
  protected $Pengaduan_onlineModel;
  protected $Meeting_requestModel;
  protected $KategoriModel;
  protected $CustModel;
  protected $PetugasModel;
  protected $Landing_pageModel;
  protected $TandaTerimaModel;
  protected $PegawaiModel;

  public function __construct()
  {
    $this->Pengaduan_onlineModel = new Pengaduan_onlineModel();
    $this->Meeting_requestModel = new Meeting_requestModel();
    $this->KategoriModel = new KategoriModel();
    $this->CustModel = new CustModel();
    $this->PetugasModel = new PetugasModel();
    $this->Landing_pageModel = new Landing_pageModel();
    $this->TandaTerimaModel = new TandaTerimaModel();
    $this->PegawaiModel = new PegawaiModel();
  }

  public function filter_cust()
  {
    $cek = $this->request->getVar('cek');
    $kategori = $this->request->getVar('kategori');
    $period = $this->request->getVar('period');
    $monthAgo = date('Y-m-d', strtotime($period . " month", strtotime(date("Y-m-d"))));
    function dashboard_cust($cek = '', $kategori = '', $monthAgo = '')
    {
      $Pengaduan_onlineModel = new Pengaduan_onlineModel();
      $Meeting_requestModel = new Meeting_requestModel();
      $KategoriModel = new KategoriModel();

      if ($cek == 'ok') {
        $kategori = $kategori;
        $monthAgo = $monthAgo;
        dd($kategori);
      } else {
        $kategori = 0;
        $monthAgo = date('Y-m-d', strtotime("-1 month", strtotime(date("Y-m-d"))));
      }

      $data = [
        'title' => 'Dashboard Customer',
        'groupPengaduan' => $Pengaduan_onlineModel->groupByStatus(session('idCustomer'), $kategori, $monthAgo),
        'groupMeeting' => $Meeting_requestModel->groupByStatus(session('idCustomer'), $monthAgo),
        'pengaduanPerminggu' => $Pengaduan_onlineModel->pengaduanPerminggu(session('idCustomer')),
        'meetingPerminggu' => $Meeting_requestModel->meetingRequestPerminggu(session('idCustomer')),
        'lastPengaduan' => $Pengaduan_onlineModel->lastPengaduan(session('idCustomer')),
        'lastMeetingRequest' => $Meeting_requestModel->lastMeetingRequest(session('idCustomer')),
        'jumlahMeeting' => $Meeting_requestModel->jumlah_meetingCustomer(session('idCustomer')),
        'jumlahPengaduan' => $Pengaduan_onlineModel->jumlah_pengaduanCustomer(session('idCustomer')),
        'kategori' => $KategoriModel->getKategori(),
      ];

      return view('backend/dashboard_cust', $data);
    }

    return dashboard_cust($cek, $kategori, $monthAgo);
  }


  public function dashboard_petugas($period = 1)
  {
    $monthAgo = date('Y-m-d', strtotime("-" . $period . " month", strtotime(date("Y-m-d"))));

    $data = [
      'title' => 'Dashboard Petugas',
      'groupPengaduan' => $this->Pengaduan_onlineModel->groupByStatusPetugas(session('idPetugas'), session('Unit'), $monthAgo),
      'groupMeeting' => $this->Meeting_requestModel->groupByStatusPetugas(session('idPetugas'), $monthAgo),
      'pengaduanPerminggu' => $this->Pengaduan_onlineModel->pengaduanPetugasPerminggu(session('idPetugas'), session('Unit'), $monthAgo),
      'meetingPerminggu' => $this->Meeting_requestModel->meetingRequestPetugasPerminggu(session('idPetugas'), $monthAgo),
      'lastMeetingRequest' => $this->Meeting_requestModel->lastMeetingRequest(session('idPetugas')),
      'kategori' => $this->KategoriModel->getKategori(),
      'customer' => $this->CustModel->jumlah_cust(),
      'cust_baru' => $this->CustModel->cust_baru($monthAgo),
      'jumlah_tandaTerima' => $this->TandaTerimaModel->jumlah_tandaTerima(session('idPetugas')),
      'month' => $monthAgo
    ];

    return view('backend/dashboard_petugas', $data);
  }

  public function dashboard_admin_landing()
  {
    $tgl    = date('Y-m-d', strtotime("-7 day", strtotime(date("Y-m-d"))));
    $data = [
      'title' => 'Dashboard Admin Landing Page',
      'groupAgenda' => $this->Landing_pageModel->groupByStatusAgenda(session('idPetugas')),
      'groupInfo' => $this->Landing_pageModel->groupByKategoriInfo(session('idPetugas')),
      'lastBerita' => $this->Landing_pageModel->lastBerita(session('idPetugas')),
      'kategori' => $this->KategoriModel->getKategori(),
      'customer' => $this->CustModel->jumlah_cust(),
      'cust_baru' => $this->CustModel->cust_baru($tgl),
      'petugas' => $this->PetugasModel->jumlah_petugas(),
      'pegawai' => $this->PegawaiModel->jumlah_pegawai()
    ];

    return view('backend/dashboard_admin_landing', $data);
  }
}
