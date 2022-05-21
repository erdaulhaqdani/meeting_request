<?php

namespace App\Controllers;

use App\Models\Pengaduan_onlineModel;
use App\Models\Meeting_requestModel;

class Backend extends BaseController
{
  protected $Pengaduan_onlineModel;
  protected $Meeting_requestModel;

  public function __construct()
  {
    $this->Pengaduan_onlineModel = new Pengaduan_onlineModel();
    $this->Meeting_requestModel = new Meeting_requestModel();
  }

  public function dashboard_cust()
  {
    $groupPengaduan = $this->Pengaduan_onlineModel->select('COUNT(idPengaduan) AS Jumlah, Status AS Status')
      ->groupBy('Status')
      ->get();

    $groupMeeting = $this->Meeting_requestModel->select('COUNT(idMeeting) AS Jumlah, Status AS Status')
      ->groupBy('Status')
      ->get();

    $data = [
      'title' => 'Dashboard Customer',
      'groupPengaduan' => $this->Pengaduan_onlineModel->groupByStatus(session('idCustomer')),
      'groupMeeting' => $this->Meeting_requestModel->groupByStatus(session('idCustomer'))
    ];

    return view('backend/dashboard_cust', $data);
  }

  public function dashboard_petugas()
  {
    return view('backend/dashboard_petugas');
  }
}
