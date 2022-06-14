<?php

namespace App\Controllers;

use App\Models\Pengaduan_onlineModel;
use App\Models\KategoriModel;
use App\Models\CustModel;
use App\Models\PetugasModel;
use App\Models\Tanggapan_POModel;
use App\Models\LevelModel;

class Home extends BaseController
{
    protected $Pengaduan_onlineModel;
    protected $KategoriModel;
    protected $CustModel;
    protected $PetugasModel;
    protected $Tanggapan_POModel;
    protected $LevelModel;

    public function __construct()
    {
        $this->Pengaduan_onlineModel = new Pengaduan_onlineModel();
        $this->KategoriModel = new KategoriModel();
        $this->CustModel = new CustModel();
        $this->PetugasModel = new PetugasModel();
        $this->Tanggapan_POModel = new Tanggapan_POModel();
        $this->Tanggapan_POModel = new Tanggapan_POModel();
        $this->LevelModel = new LevelModel();
    }
    public function index()
    {
        return view('welcome_message');
    }

    public function getNotif()
    {
        $data = $this->Pengaduan_onlineModel->listPengaduanCustomer(session('idCustomer'));
        $result['pesan'] = 'Cek Notifikasi';
        echo json_encode($result);
    }
}
