<?php

namespace App\Controllers;

use App\Models\Meeting_requestModel;
use App\Models\KategoriModel;
use App\Models\CustModel;
use App\Models\Tanggapan_MRModel;
use App\Models\PetugasModel;
use App\Models\TandaTerimaModel;

class Petugas_MR extends BaseController
{
    protected $Meeting_requestModel;
    protected $KategoriModel;
    protected $CustModel;
    protected $Tanggapan_MRModel;
    protected $PetugasModel;
    protected $TandaTerimaModel;

    public function __construct()
    {
        $this->Meeting_requestModel = new Meeting_requestModel();
        $this->KategoriModel = new KategoriModel();
        $this->CustModel = new CustModel();
        $this->Tanggapan_MRModel = new Tanggapan_MRModel();
        $this->PetugasModel = new PetugasModel();
        $this->TandaTerimaModel = new TandaTerimaModel();
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

    public function form_tandaTerima()
    {
        $data = [
            'title' => 'Tambah Tanda Terima',
            'validation' => \Config\Services::validation(),
        ];

        return view('meeting_request/form_tanda_terima', $data);
    }

    public function input_tandaTerima()
    {
        $this->TandaTerimaModel->save([
            'Pengirim' => $this->request->getVar('pengirim'),
            'No_surat' => $this->request->getVar('no_surat'),
            'Tanggal' => $this->request->getVar('tanggal'),
            'Perihal' => $this->request->getVar('perihal'),
        ]);

        session()->setFlashdata('pesan', 'Tanda Terima berhasil ditambahkan.');

        return redirect()->to('/petugasMR/form_tandaTerima');
    }

    public function daftar_tandaTerima()
    {
        $data = [
            'title' => 'Daftar Tanda Terima',
            'tanda_terima' => $this->TandaTerimaModel->findAll(),
        ];
        return view('/meeting_request/daftar_tanda_terima', $data);
    }

    public function delete_tandaTerima($id)
    {

        $this->TandaTerimaModel->delete($id);

        session()->setFlashdata('pesan', 'Berhasil menghapus Tanda Terima.');

        return redirect()->to('/petugasMR/daftar_tandaTerima');
    }

    public function edit_tandaTerima($id)
    {
        $data = [
            'title' => 'Ubah Tanda Terima',
            'validation' => \Config\Services::validation(),
            'tanda_terima' => $this->TandaTerimaModel->getTandaTerima($id),
        ];

        return view('meeting_request/edit_tanda_terima', $data);
    }

    public function update_tandaTerima($id)
    {

        $this->TandaTerimaModel->save([
            'id_tt' => $id,
            'Pengirim' => $this->request->getVar('pengirim'),
            'No_surat' => $this->request->getVar('no_surat'),
            'Tanggal' => $this->request->getVar('tanggal'),
            'Perihal' => $this->request->getVar('perihal'),
        ]);

        session()->setFlashdata('pesan', 'Berhasil mengubah Tanda Terima');

        return redirect()->to('/petugasMR/daftar_tandaTerima');
    }
}
