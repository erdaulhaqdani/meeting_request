<?php

namespace App\Controllers;

use App\Models\Pengaduan_onlineModel;
use App\Models\Meeting_requestModel;
use App\Models\KategoriModel;

class Backend extends BaseController
{
  protected $Pengaduan_onlineModel;
  protected $Meeting_requestModel;
  protected $KategoriModel;

  public function __construct()
  {
    $this->Pengaduan_onlineModel = new Pengaduan_onlineModel();
    $this->Meeting_requestModel = new Meeting_requestModel();
    $this->KategoriModel = new KategoriModel();
  }

  public function dashboard_cust()
  {
    $data = [
      'title' => 'Dashboard Customer',
      'groupPengaduan' => $this->Pengaduan_onlineModel->groupByStatus(session('idCustomer')),
      'groupMeeting' => $this->Meeting_requestModel->groupByStatus(session('idCustomer')),
      'pengaduanPerminggu' => $this->Pengaduan_onlineModel->pengaduanPerminggu(session('idCustomer')),
      'meetingRequestPerminggu' => $this->Meeting_requestModel->meetingRequestPerminggu(session('idCustomer')),
      'lastMeetingRequest' => $this->Meeting_requestModel->lastMeetingRequest(session('idCustomer')),
      'kategori' => $this->KategoriModel->getKategori(),
    ];

    return view('backend/dashboard_cust', $data);
  }

  public function dashboard_petugas()
  {
    return view('backend/dashboard_petugas');
  }
}
