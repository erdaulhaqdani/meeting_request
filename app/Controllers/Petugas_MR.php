<?php

namespace App\Controllers;

use App\Models\Meeting_requestModel;
use App\Models\KategoriModel;
use App\Models\CustModel;
use App\Models\Tanggapan_MRModel;
use App\Models\PetugasModel;

class Petugas_MR extends BaseController
{
    protected $Meeting_requestModel;
    protected $KategoriModel;
    protected $CustModel;
    protected $Tanggapan_MRModel;
    protected $PetugasModel;

    public function __construct()
    {
        $this->Meeting_requestModel = new Meeting_requestModel();
        $this->KategoriModel = new KategoriModel();
        $this->CustModel = new CustModel();
        $this->Tanggapan_MRModel = new Tanggapan_MRModel();
        $this->PetugasModel = new PetugasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Meeting Request',
            'meeting' => $this->Meeting_requestModel->listMeetingPetugas(session('idLevel'), session('Unit')),
            'belum' => $this->Meeting_requestModel->jumlahMeetingBelumDiprosesPetugas(),
            'proses' => $this->Meeting_requestModel->jumlahMeetingDiprosesPetugas(),
            'selesai' => $this->Meeting_requestModel->jumlahMeetingSelesaiDiprosesPetugas(),
            'kategori' => $this->KategoriModel->getKategori()
        ];

        return view('Meeting_request/petugas_beranda', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Pengaduan Online',
            'meeting' => $this->Meeting_requestModel->getMeetingRequest($id),
            'customer' => $this->CustModel->getCustomer(),
            'kategori' => $this->KategoriModel->getKategori(),
        ];

        return view('Meeting_request/petugas_detail', $data);
    }

    public function tanggapan($idMeeting)
    {
        $data = [
            'title' => 'Tanggapan',
            'validation' => \Config\Services::validation(),
            'idMeeting' => $idMeeting
        ];

        return view('Meeting_request/petugas_tanggapan', $data);
    }

    public function proses($id)
    {
        helper('date');
        $now = date('Y-m-d H:i:s', now());

        $this->Meeting_requestModel->save([
            'idMeeting' => $id,
            'Status' => 'Sedang diproses'
        ]);

        session()->setFlashdata('pesan', 'Meeting Request mulai diproses');

        return redirect()->to('/petugasMR');
    }

    public function inputTanggapan()
    {
        if (!$this->validate([
            'lampiran' => [
                'rules' => 'max_size[lampiran,5120]|ext_in[lampiran,jpg,jpeg,png,pdf,mp3,mpeg]',
                'errors' => [
                    'max_size' => 'Maksimal 5MB',
                    'ext_in' => 'jenis file harus jpg, png, pdf, mp3, atau mpeg'
                ]
            ]
        ])) {
            $validation =  \Config\Services::validation();
            return redirect()->to('/petugasMR/tanggapan')->withInput()->with('validation', $validation);
        }

        //ambil file
        $lampiran = $this->request->getFile('lampiran');
        if ($lampiran->getError() == 4) {
            $namalampiran = 'default.png';
        } else {
            //ambil nama file
            $namalampiran = $lampiran->getRandomName();
            //pindah file
            $lampiran->move('lampiran_MR', $namalampiran);
        }


        $this->Tanggapan_MRModel->save([
            'Isi' => $this->request->getVar('isi'),
            'Lampiran' => $namalampiran,
            'idMeeting' => $this->request->getVar('idMeeting')
        ]);

        $this->Meeting_requestModel->save([
            'idMeeting' => $this->request->getVar('idMeeting'),
            'Status' => $this->request->getVar('status')
        ]);

        session()->setFlashdata('pesan', 'Tanggapan berhasil tersimpan.');

        return redirect()->to('/petugasMR');
    }
}
