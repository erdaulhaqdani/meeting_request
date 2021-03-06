<?php

namespace App\Controllers;

use App\Models\Meeting_requestModel;
use App\Models\KategoriModel;
use App\Models\CustModel;
use App\Models\Tanggapan_MRModel;
use App\Models\PetugasModel;
use App\Models\TandaTerimaModel;
use App\Models\LevelModel;
use Dompdf\Dompdf;

class Petugas_MR extends BaseController
{
    protected $Meeting_requestModel;
    protected $KategoriModel;
    protected $CustModel;
    protected $Tanggapan_MRModel;
    protected $PetugasModel;
    protected $TandaTerimaModel;
    protected $LevelModel;

    public function __construct()
    {
        $this->Meeting_requestModel = new Meeting_requestModel();
        $this->KategoriModel = new KategoriModel();
        $this->CustModel = new CustModel();
        $this->Tanggapan_MRModel = new Tanggapan_MRModel();
        $this->PetugasModel = new PetugasModel();
        $this->TandaTerimaModel = new TandaTerimaModel();
        $this->LevelModel = new LevelModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Meeting Request',
            'meeting' => $this->Meeting_requestModel->listMeetingPetugas(session('idPetugas')),
            'belum' => $this->Meeting_requestModel->jumlahMeetingPetugas('Belum diproses', session('idPetugas')),
            'proses' => $this->Meeting_requestModel->jumlahMeetingPetugas('Sedang diproses', session('idPetugas')),
            'selesai' => $this->Meeting_requestModel->jumlahMeetingPetugas('Selesai diproses', session('idPetugas')),
            'eskalasi' => $this->Meeting_requestModel->jumlahMeetingPetugas('Eskalasi', session('idPetugas')),
            'kategori' => $this->KategoriModel->getKategori(),
            'customer' => $this->CustModel->getCustomer()
        ];

        return view('meeting_request/petugas_daftar_mr', $data);
    }

    public function detail($id)
    {
        $this->Meeting_requestModel->update(['idPengaduan' => $id], ['notifPetugas' => 1]);

        $meeting = $this->Meeting_requestModel->getMeetingRequest($id);
        $tanggapan = $this->Tanggapan_MRModel->trackTanggapanMeeting($id);
        $data = [
            'title' => 'Detail Meeing Request',
            'meeting' => $meeting,
            'customer' => $this->CustModel->getCustomer($meeting['idCustomer']),
            'kategori' => $this->KategoriModel->getKategori(),
            'tanggapan' => $tanggapan,
            'petugas' => $this->PetugasModel->getPetugasId(),
            'level' => $this->LevelModel->getlevel()
        ];

        return view('meeting_request/petugas_detail', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Meeting Request',
            'validation' => \Config\Services::validation(),
            'meeting' => $this->Meeting_requestModel->getMeetingRequest($id),
            'kategori' => $this->KategoriModel->getKategori()
        ];

        return view('meeting_request/petugas_edit_mr', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'lampiran' => [
                'rules' => 'max_size[lampiran,3072]',
                'errors' => [
                    'max_size' => 'Ukuran file maksimal 3MB'
                ]
            ]
        ])) {
            $validation =  \Config\Services::validation();
            return redirect()->to('/petugasMR/edit/' . $id . '')->withInput()->with('validation', $validation);
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
            $namalampiran = $lampiran->getName();
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
        ]);

        session()->setFlashdata('pesan', 'Berhasil mengubah Meeting Request');

        return redirect()->to('/petugasMR');
    }

    public function tanggapan($idMeeting)
    {
        $data = [
            'title' => 'Tanggapan',
            'validation' => \Config\Services::validation(),
            'idMeeting' => $idMeeting,
            'petugas' => $this->PetugasModel->getPetugasEskalasi(session('idPetugas'), session('idLevel'))->getResultArray(),
            'level' => $this->LevelModel->getlevel(),
        ];

        return view('meeting_request/petugas_tanggapan', $data);
    }

    public function proses($id)
    {
        helper('date');
        $now = date('Y-m-d H:i:s', now());

        $this->Meeting_requestModel->save([
            'idMeeting' => $id,
            'Status' => 'Sedang diproses',
            'idPetugas' => session('idPetugas'),
            'notifCustomer' => 0,
            'notifPetugas' => 1
        ]);

        session()->setFlashdata('pesan', 'Meeting Request mulai diproses');

        return redirect()->to('petugasMR');
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
            $lampiran->move('lampiran_petugasMR', $namalampiran);
        }


        $this->Tanggapan_MRModel->save([
            'Isi' => $this->request->getVar('isi'),
            'Lampiran' => $namalampiran,
            'idMeeting' => $this->request->getVar('idMeeting'),
            'idPetugas' => session('idPetugas'),
        ]);

        $status =  $this->request->getVar('status');

        if ($status == "Eskalasi") {
            $petugas = $this->request->getVar('petugas');
        } else {
            $petugas = session('idPetugas');
        };

        $this->Meeting_requestModel->save([
            'idMeeting' => $this->request->getVar('idMeeting'),
            'Status' => $status,
            'idPetugas' => $petugas,
            'notifCustomer' => 0,
            'notifPetugas' => 0
        ]);

        session()->setFlashdata('pesan', 'Tanggapan berhasil tersimpan.');

        return redirect()->to('petugasMR');
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
            'idPetugas' => session('idPetugas')
        ]);

        session()->setFlashdata('pesan', 'Tanda Terima berhasil ditambahkan.');

        return redirect()->to('petugasMR/daftar_tandaTerima');
    }

    public function daftar_tandaTerima()
    {
        $data = [
            'title' => 'Daftar Tanda Terima',
            'tanda_terima' => $this->TandaTerimaModel->listTandaTerima(session('idPetugas')),
        ];
        return view('meeting_request/daftar_tanda_terima', $data);
    }

    public function delete_tandaTerima($id)
    {

        $this->TandaTerimaModel->delete($id);

        session()->setFlashdata('pesan', 'Berhasil menghapus Tanda Terima.');

        return redirect()->to('petugasMR/daftar_tandaTerima');
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
            'idPetugas' => session('idPetugas')
        ]);

        session()->setFlashdata('pesan', 'Berhasil mengubah Tanda Terima');

        return redirect()->to('petugasMR/daftar_tandaTerima');
    }

    public function cetak_tandaTerima($id)
    {
        $data = [
            'tanda_terima' => $this->TandaTerimaModel->getTandaTerima($id),
        ];
        $html = view('meeting_request/cetak_tanda_terima', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
