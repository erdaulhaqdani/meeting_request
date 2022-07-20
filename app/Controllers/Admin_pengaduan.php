<?php

namespace App\Controllers;

use App\Models\Pengaduan_onlineModel;
use App\Models\Tanggapan_POModel;
use App\Models\CustModel;
use App\Models\PetugasModel;
use App\Models\KategoriModel;
use App\Models\LevelModel;
use App\Models\UserModel;

use Dompdf\Dompdf;

class Admin_pengaduan extends BaseController
{
    protected $Pengaduan_onlineModel;
    protected $Tanggapan_POModel;
    protected $CustModel;
    protected $PetugasModel;
    protected $KategoriModel;
    protected $LevelModel;
    protected $UserModel;

    public function __construct()
    {
        $this->Pengaduan_onlineModel = new Pengaduan_onlineModel();
        $this->Tanggapan_POModel = new Tanggapan_POModel();
        $this->CustModel = new CustModel();
        $this->PetugasModel = new PetugasModel();
        $this->KategoriModel = new KategoriModel();
        $this->LevelModel = new LevelModel();
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pengaduan Online',
            'pengaduan' => $this->Pengaduan_onlineModel->listPengaduanAdmin(session('idLevel'), session('Unit'), session('idPetugas')),
            'belum' => $this->Pengaduan_onlineModel->jumlahPengaduanAdmin('Belum diproses', session('idPetugas'), session('Unit')),
            'proses' => $this->Pengaduan_onlineModel->jumlahPengaduanAdmin('Sedang diproses', session('idPetugas'), session('Unit')),
            'selesai' => $this->Pengaduan_onlineModel->jumlahPengaduanAdmin('Selesai diproses', session('idPetugas'), session('Unit')),
            'eskalasi' => $this->Pengaduan_onlineModel->jumlahPengaduanAdmin('Eskalasi', session('idPetugas'), session('Unit')),
            'kategori' => $this->KategoriModel->getKategori()
        ];

        return view('pengaduan_online/admin_beranda', $data);
    }

    public function daftar($status)
    {
        $data = [
            'title' => 'Daftar Pengaduan Online',
            'pengaduan' => $this->Pengaduan_onlineModel->listPengaduanAdmin2($status, session('idLevel'), session('Unit'), session('idPetugas')),
            'kategori' => $this->KategoriModel->getKategori()
        ];

        return view('pengaduan_online/admin_daftar', $data);
    }

    public function profile()
    {
        $petugas = $this->PetugasModel->getPetugas(session('Email'));

        $data = [
            'title' => 'Profile Petugas',
            'petugas' => $petugas,
            'level' => $this->LevelModel->getlevel($petugas['idLevel']),
            'kategori' => $this->KategoriModel->getKategori($petugas['Unit'])
        ];

        return view('pengaduan_online/profile_petugas', $data);
    }

    public function in_profile()
    {
        $this->PetugasModel->save([
            'idPetugas' => $this->request->getVar('idPetugas'),
            'Nama' => $this->request->getVar('nama'),
            // 'Email' => $this->request->getVar('email'),
            'Kantor' => $this->request->getVar('kantor')
        ]);

        session()->setFlashdata('pesan', 'berhasil menyunting profil.');

        return redirect()->to('/admin/profile');
    }

    public function gantiPassword()
    {
        $petugas = $this->request->getVar('idPetugas');
        $arrPetugas = $this->PetugasModel->getPetugasId($petugas);
        $arrUser = $this->UserModel->getUser($arrPetugas['Email']);

        $oldPass = $this->request->getVar('oldPass');
        $newPass = $this->request->getVar('newPass');
        $confPass = $this->request->getVar('confPass');

        if (password_verify($oldPass, $arrPetugas['Password'])) {
            if ($newPass == $confPass) {
                $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);

                $this->PetugasModel->update($petugas, ['Password' => $hashedPass]);

                $this->UserModel->update($arrUser[0]['idUser'], ['Password' => $hashedPass]);

                session()->setFlashdata('pesan_pass', 'berhasil menyunting password.');
            } else {
                session()->setFlashdata('pesan_error', 'password baru dan konfirmasi password tidak sama.');
            }
        } else {
            session()->setFlashdata('pesan_error', 'password lama salah.');
        }

        return redirect()->to('/admin/profile');
    }

    public function detail($id)
    {
        $this->Pengaduan_onlineModel->update(['idPengaduan' => $id], ['notifPetugas' => 1]);

        $pengaduan = $this->Pengaduan_onlineModel->getPengaduan($id);
        $tanggapan = $this->Tanggapan_POModel->trackTanggapanPengaduan($id);
        $data = [
            'title' => 'Detail Pengaduan Online',
            'pengaduan' => $pengaduan,
            'customer' => $this->CustModel->getCustomer($pengaduan['idCustomer']),
            'kategori' => $this->KategoriModel->getKategori($pengaduan['idKategori']),
            'tanggapan' => $tanggapan,
            'petugas' => $this->PetugasModel->getPetugasId(),
            'level' => $this->LevelModel->getlevel()
        ];

        return view('pengaduan_online/admin_detail', $data);
    }

    public function bukti($id)
    {
        $pengaduan = $this->Pengaduan_onlineModel->getPengaduan($id);
        if ($pengaduan['Status'] == 'Belum diproses') {
            $data = [
                'title' => 'Bukti Pengaduan Online',
                'pengaduan' => $pengaduan,
                'customer' => $this->CustModel->getCustomer($pengaduan['idCustomer']),
                'kategori' => $this->KategoriModel->getKategori($pengaduan['idKategori'])
            ];
        } elseif ($pengaduan['Status'] == 'Selesai diproses') {
            $tanggapan = $this->Tanggapan_POModel->getTanggapanPengaduan($pengaduan['idPengaduan']);
            $petugas = $this->PetugasModel->getPetugasId($tanggapan['idPetugas']);
            $data = [
                'title' => 'Bukti Pengaduan Online',
                'pengaduan' => $pengaduan,
                'customer' => $this->CustModel->getCustomer($pengaduan['idCustomer']),
                'kategori' => $this->KategoriModel->getKategori($pengaduan['idKategori']),
                'tanggapan' => $tanggapan,
                'petugas' => $petugas,
                'level' => $this->LevelModel->getlevel($petugas['idLevel'])
            ];
        } else {
            $data = [
                'title' => 'Bukti Pengaduan Online',
                'pengaduan' => $pengaduan,
                'customer' => $this->CustModel->getCustomer($pengaduan['idCustomer']),
                'kategori' => $this->KategoriModel->getKategori($pengaduan['idKategori'])
            ];
        }

        return view('pengaduan_online/bukti_pengaduan_online', $data);
    }

    public function print($id)
    {
        $dompdf = new Dompdf();

        $pengaduan = $this->Pengaduan_onlineModel->getPengaduan($id);
        if ($pengaduan['Status'] == 'Belum diproses') {
            $data = [
                'title' => 'Bukti Pengaduan Online',
                'pengaduan' => $pengaduan,
                'customer' => $this->CustModel->getCustomer($pengaduan['idCustomer']),
                'kategori' => $this->KategoriModel->getKategori($pengaduan['idKategori'])
            ];
        } elseif ($pengaduan['Status'] == 'Selesai diproses') {
            $tanggapan = $this->Tanggapan_POModel->getTanggapanPengaduan($pengaduan['idPengaduan']);
            $petugas = $this->PetugasModel->getPetugasId($tanggapan['idPetugas']);
            $data = [
                'title' => 'Bukti Pengaduan Online',
                'pengaduan' => $pengaduan,
                'customer' => $this->CustModel->getCustomer($pengaduan['idCustomer']),
                'kategori' => $this->KategoriModel->getKategori($pengaduan['idKategori']),
                'tanggapan' => $tanggapan,
                'petugas' => $petugas,
                'level' => $this->LevelModel->getlevel($petugas['idLevel'])
            ];
        } else {
            $data = [
                'title' => 'Bukti Pengaduan Online',
                'pengaduan' => $pengaduan,
                'customer' => $this->CustModel->getCustomer($pengaduan['idCustomer']),
                'kategori' => $this->KategoriModel->getKategori($pengaduan['idKategori'])
            ];
        }

        $html = view('pengaduan_online/bukti_pengaduan_online', $data);
        $dompdf->setPaper('A4', 'Landscape');
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream('Bukti pengaduan');
    }

    public function tanggapan($idPengaduan)
    {
        $data = [
            'title' => 'Tanggapan',
            'validation' => \Config\Services::validation(),
            'petugas' => $this->PetugasModel->getPetugasEskalasi(session('idPetugas'), session('idLevel'), session('Unit'))->getResultArray(),
            'level' => $this->LevelModel->getlevel(),
            'idPengaduan' => $idPengaduan
        ];

        return view('pengaduan_online/admin_tanggapan', $data);
    }

    public function proses($id)
    {
        helper('date');
        $now = date('Y-m-d H:i:s', now());

        $this->Pengaduan_onlineModel->save([
            'idPengaduan' => $id,
            'Status' => 'Sedang diproses',
            'idPetugas' => session('idPetugas'),
            'notifCustomer' => 0
        ]);

        session()->setFlashdata('pesan', 'Pengaduan mulai diproses');

        return redirect()->to('/admin');
    }

    public function input()
    {
        if (!$this->validate([
            'isi' => [
                'rules' => 'max_length[200]|min_length[5]',
                'errors' => [
                    'max_length' => 'Isi pengaduan maksimal 200 karakter',
                    'min_length' => 'Isi pengaduan minimal 5 karakter'
                ]
            ],
            'lampiran' => [
                'rules' => 'max_size[lampiran,5120]|ext_in[lampiran,jpg,jpeg,png,pdf,mp3,mpeg]',
                'errors' => [
                    'max_size' => 'Maksimal 5MB',
                    'ext_in' => 'jenis file harus jpg, png, pdf, mp3, atau mpeg'
                ]
            ]
        ])) {
            $validation =  \Config\Services::validation();
            return redirect()->to('/admin/tanggapan')->withInput()->with('validation', $validation);
        }

        //ambil file
        $lampiran = $this->request->getFile('lampiran');
        if ($lampiran->getError() == 4) {
            $namalampiran = 'user.png';
        } else {
            //ambil nama file
            $namalampiran = $lampiran->getRandomName();
            //pindah file
            $lampiran->move('lampiran', $namalampiran);
        }

        $this->Tanggapan_POModel->save([
            'Isi' => $this->request->getVar('isi'),
            'Lampiran' => $namalampiran,
            'idPetugas' => session('idPetugas'),
            'idPengaduan' => $this->request->getVar('idPengaduan')
        ]);

        $status = $this->request->getVar('status');

        if ($status == "Eskalasi") {
            $petugas = $this->request->getVar('petugas');
        } else {
            $petugas = session('idPetugas');
        };

        $this->Pengaduan_onlineModel->save([
            'idPengaduan' => $this->request->getVar('idPengaduan'),
            'Status' => $status,
            'idPetugas' => $petugas,
            'notifCustomer' => 0,
            'notifPetugas' => 0
        ]);

        session()->setFlashdata('pesan', 'Tanggapan berhasil tersimpan.');

        return redirect()->to('/admin');
    }
}
