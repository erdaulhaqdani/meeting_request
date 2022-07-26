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

  public function dashboard_cust($period = 1, $kategori = 0)
  {
    $monthAgo = date('Y-m-d', strtotime("-" . $period . " month", strtotime(date("Y-m-d"))));
    $week = date('Y-m-d', strtotime("-7 day", strtotime(date("Y-m-d"))));
    $uri = new \CodeIgniter\HTTP\URI(current_url(true));
    dd(count($uri->getSegments()));
    if (count($uri->getSegments()) == 1) {
      $filterPeriod = 1;
      $filterKategori = 0;
    } elseif (count($uri->getSegments()) == 3) {
      $filterPeriod = $uri->getSegment(2);
      $filterKategori = $uri->getSegment(3);
    }
    $data = [
      'title' => 'Dashboard Customer',
      'groupPengaduan' => $this->Pengaduan_onlineModel->groupByStatus(session('idCustomer'), $kategori, $monthAgo),
      'groupMeeting' => $this->Meeting_requestModel->groupByStatus(session('idCustomer'), $kategori, $monthAgo),
      'pengaduanPerminggu' => $this->Pengaduan_onlineModel->pengaduanPerminggu(session('idCustomer'), $week),
      'meetingPerminggu' => $this->Meeting_requestModel->meetingRequestPerminggu(session('idCustomer'), $week),
      'lastPengaduan' => $this->Pengaduan_onlineModel->lastPengaduan(session('idCustomer')),
      'lastMeetingRequest' => $this->Meeting_requestModel->lastMeetingRequest(session('idCustomer')),
      'jumlahMeeting' => $this->Meeting_requestModel->jumlah_meetingCustomer(session('idCustomer')),
      'jumlahPengaduan' => $this->Pengaduan_onlineModel->jumlah_pengaduanCustomer(session('idCustomer')),
      'kategori' => $this->KategoriModel->getKategori(),
      'filterPeriod' => $filterPeriod,
      'filterKategori' => $filterKategori,
    ];

    return view('backend/dashboard_cust', $data);
  }

  public function dashboard_petugas($period = 1, $kategori = 0)
  {
    $monthAgo = date('Y-m-d', strtotime("-" . $period . " month", strtotime(date("Y-m-d"))));
    $week = date('Y-m-d', strtotime("-7 day", strtotime(date("Y-m-d"))));
    $uri = new \CodeIgniter\HTTP\URI(current_url(true));

    $data = [
      'title' => 'Dashboard Petugas',
      'groupPengaduan' => $this->Pengaduan_onlineModel->groupByStatusPetugas(session('idPetugas'), session('Unit'), $monthAgo),
      'groupMeeting' => $this->Meeting_requestModel->groupByStatusPetugas(session('idPetugas'), $kategori, $monthAgo),
      'pengaduanPerminggu' => $this->Pengaduan_onlineModel->pengaduanPetugasPerminggu(session('idPetugas'), session('Unit'), $week),
      'meetingPerminggu' => $this->Meeting_requestModel->meetingRequestPetugasPerminggu(session('idPetugas'), $week),
      'lastMeetingRequest' => $this->Meeting_requestModel->lastMeetingRequest(session('idPetugas')),
      'kategori' => $this->KategoriModel->getKategori(),
      'customer' => $this->CustModel->jumlah_cust(),
      'cust_baru' => $this->CustModel->cust_baru($monthAgo),
      'jumlah_tandaTerima' => $this->TandaTerimaModel->jumlah_tandaTerima(session('idPetugas')),
      'filterPeriod' => $uri->getSegment(2),
      'filterKategori' => $uri->getSegment(3),
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
