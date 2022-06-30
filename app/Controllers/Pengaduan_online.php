<?php

namespace App\Controllers;

use App\Models\Pengaduan_onlineModel;
use App\Models\KategoriModel;
use App\Models\CustModel;
use App\Models\PetugasModel;
use App\Models\Tanggapan_POModel;
use App\Models\LevelModel;
use App\Models\UserModel;

use Dompdf\Dompdf;

class Pengaduan_online extends BaseController
{
    protected $Pengaduan_onlineModel;
    protected $KategoriModel;
    protected $CustModel;
    protected $PetugasModel;
    protected $Tanggapan_POModel;
    protected $LevelModel;
    protected $UserModel;

    public function __construct()
    {
        $this->Pengaduan_onlineModel = new Pengaduan_onlineModel();
        $this->KategoriModel = new KategoriModel();
        $this->CustModel = new CustModel();
        $this->PetugasModel = new PetugasModel();
        $this->Tanggapan_POModel = new Tanggapan_POModel();
        $this->Tanggapan_POModel = new Tanggapan_POModel();
        $this->LevelModel = new LevelModel();
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Riwayat Pengaduan Online',
            'pengaduan' => $this->Pengaduan_onlineModel->listPengaduanCustomer(session('idCustomer')),
            'belum' => $this->Pengaduan_onlineModel->jumlahPengaduan(session('idCustomer'), 'Belum diproses'),
            'proses' => $this->Pengaduan_onlineModel->jumlahPengaduan(session('idCustomer'), 'Sedang diproses'),
            'selesai' => $this->Pengaduan_onlineModel->jumlahPengaduan(session('idCustomer'), 'Selesai diproses'),
            'eskalasi' => $this->Pengaduan_onlineModel->jumlahPengaduan(session('idCustomer'), 'Eskalasi'),
            'kategori' => $this->KategoriModel->getKategori()
        ];

        return view('pengaduan_online/view_pengaduan_online', $data);
    }

    public function getNotifCustomer()
    {
        $query = $this->Pengaduan_onlineModel->notifCustomer(session('idCustomer'))->getResultArray();
        $count = $this->Pengaduan_onlineModel->notifCustomer(session('idCustomer'))->getNumRows();
        $output = '';

        if ($count > 0) {
            foreach ($query as $row) {
                if ($row['Tiket'] == 'PO') {
                    $output .= '
                        <a href="/Pengaduan_online/detail/' . $row['idPengaduan'] . '" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="fas fa-file-alt"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-1">' . $row['Judul'] . '</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1 text-primary">Pengaduan Online</p>
                                        <p class="mb-1">' . $row['Status'] . '</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> ' . $row['updated_at'] . '</p>
                                    </div>
                                </div>
                            </div>   
                        </a>';
                } elseif ($row['Tiket'] == 'MR') {
                    $output .= '
                        <a href="/Meeting_request/detail/' . $row['idPengaduan'] . '" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="fas fa-calendar-day"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-1">' . $row['Judul'] . '</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1 text-primary">Meeting Request</p>
                                        <p class="mb-1">' . $row['Status'] . '</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> ' . $row['updated_at'] . '</p>
                                    </div>
                                </div>
                            </div>   
                        </a>';
                }
            }
        } else {
            $output .= '
            <a href="#" class="text-reset notification-item">
                <div class="d-flex">
                    <div class="avatar-xs me-3">
                        <span class="avatar-title bg-danger rounded-circle font-size-16">
                            <i class="fas fa-times"></i>
                        </span>
                    </div>
                    <div class="flex-1">
                        <div class="font-size-12 text-muted">
                            <p class="mt-2">Tidak ada notifikasi terbaru</p>
                        </div>
                    </div>
                </div>';
        }

        $data = array(
            'notification' => $output,
            'unread_notification' => $count
        );

        echo json_encode($data);
    }

    public function getNotifPetugas()
    {
        $query = $this->Pengaduan_onlineModel->notifPetugas(session('idPetugas'), session('Unit'))->getResultArray();
        $count = $this->Pengaduan_onlineModel->notifPetugas(session('idPetugas'), session('Unit'))->getNumRows();
        $output = '';

        if ($count > 0) {
            foreach ($query as $row) {
                if ($row['Tiket'] == 'PO') {
                    $output .= '
                        <a href="/admin/detail/' . $row['idPengaduan'] . '" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="fas fa-file-alt"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-1">' . $row['Judul'] . '</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1 text-primary">Pengaduan Online</p>
                                        <p class="mb-1">' . $row['Status'] . '</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> ' . $row['updated_at'] . '</p>
                                    </div>
                                </div>
                            </div>   
                        </a>';
                } elseif ($row['Tiket'] == 'MR') {
                    $output .= '
                        <a href="/petugasMR/detail/' . $row['idPengaduan'] . '" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="fas fa-calendar-day"></i>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-1">' . $row['Judul'] . '</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1 text-primary">Meeting Request</p>
                                        <p class="mb-1">' . $row['Status'] . '</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> ' . $row['updated_at'] . '</p>
                                    </div>
                                </div>
                            </div>   
                        </a>';
                }
            }
        } else {
            $output .= '
            <a href="#" class="text-reset notification-item">
                <div class="d-flex">
                    <div class="avatar-xs me-3">
                        <span class="avatar-title bg-warning rounded-circle font-size-16">
                            <i class="fas fa-times"></i>
                        </span>
                    </div>
                    <div class="flex-1">
                        <div class="font-size-12 text-muted">
                            <p class="mt-2">Tidak ada notifikasi terbaru</p>
                        </div>
                    </div>
                </div>';
        }

        $data = array(
            'notification' => $output,
            'unread_notification' => $count
        );

        echo json_encode($data);
    }

    public function daftar($status)
    {
        $data = [
            'title' => 'Riwayat Pengaduan Online',
            'pengaduan' => $this->Pengaduan_onlineModel->listPengaduanCustomer2(session('idCustomer'), $status),
            'kategori' => $this->KategoriModel->getKategori()
        ];

        return view('pengaduan_online/daftar_pengaduan_online', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile Customer',
            'customer' => $this->CustModel->getCustomer(session('idCustomer'))
        ];

        return view('pengaduan_online/profile_customer', $data);
    }


    public function rating($id)
    {
        $data = [
            'title' => 'Rating & Ulasan',
            'pengaduan' => $this->Pengaduan_onlineModel->getPengaduan($id)
        ];

        return view('pengaduan_online/rating_pengaduan_online', $data);
    }

    public function detail($id)
    {
        $this->Pengaduan_onlineModel->update(['idPengaduan' => $id], ['notifCustomer' => 1]);

        $pengaduan = $this->Pengaduan_onlineModel->getPengaduan($id);
        if ($pengaduan['Status'] == 'Belum diproses') {
            $data = [
                'title' => 'Detail Pengaduan Online',
                'pengaduan' => $pengaduan,
                'customer' => $this->CustModel->getCustomer($pengaduan['idCustomer']),
                'kategori' => $this->KategoriModel->getKategori($pengaduan['idKategori'])
            ];
        } elseif ($pengaduan['Status'] == 'Selesai diproses') {
            $tanggapan = $this->Tanggapan_POModel->getTanggapanPengaduan($id);
            $petugas = $this->PetugasModel->getPetugasId($tanggapan['idPetugas']);

            $data = [
                'title' => 'Detail Pengaduan Online',
                'pengaduan' => $pengaduan,
                'customer' => $this->CustModel->getCustomer($pengaduan['idCustomer']),
                'kategori' => $this->KategoriModel->getKategori($pengaduan['idKategori']),
                'tanggapan' => $tanggapan,
                'petugas' => $petugas,
                'level' => $this->LevelModel->getlevel($petugas['idLevel'])
            ];
        } else {
            $data = [
                'title' => 'Detail Pengaduan Online',
                'pengaduan' => $pengaduan,
                'customer' => $this->CustModel->getCustomer($pengaduan['idCustomer']),
                'kategori' => $this->KategoriModel->getKategori($pengaduan['idKategori'])
            ];
        }

        return view('pengaduan_online/detail_pengaduan_online', $data);
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

    public function form()
    {
        $data = [
            'title' => 'Pengajuan Pengaduan Online',
            'validation' => \Config\Services::validation(),
            'kategori' => $this->KategoriModel->getKategori()
        ];
        if (session('StatusAkun') == 'Aktif') {
            session()->setFlashdata('pesan_error', 'Untuk melakukan pengaduan, Akun anda harus terverifikasi terlebih dahulu.');
            return redirect()->to('/dashboard_cust');
        } elseif (session('StatusAkun') == 'Terverifikasi') {
            return view('pengaduan_online/form_pengaduan_online', $data);
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pengaduan Online',
            'validation' => \Config\Services::validation(),
            'pengaduan' => $this->Pengaduan_onlineModel->getPengaduan($id),
            'kategori' => $this->KategoriModel->getKategori()
        ];

        return view('pengaduan_online/edit_pengaduan_online', $data);
    }

    public function in_profile()
    {
        $data = [
            'idCustomer' => $this->request->getVar('idCustomer'),
            'Nama' => $this->request->getVar('nama'),
            'Username' => $this->request->getVar('username'),
            'NIK' => $this->request->getVar('nik'),
            'tglLahir' => $this->request->getVar('tanggal'),
            // 'Email' => $this->request->getVar('email'),
            'noHP' => $this->request->getVar('noHP'),
            'Pekerjaan' => $this->request->getVar('pekerjaan')
        ];

        $this->CustModel->save($data);

        $data = [
            'idUser' => session('idUser'),
            'Email' => $this->request->getVar('email'),
        ];
        $this->UserModel->update([]);


        session()->setFlashdata('pesan', 'Berhasil menyunting profil.');
        return redirect()->to('/Pengaduan_online/profile');
    }

    public function gantiPassword()
    {
        $customer = $this->request->getVar('idCustomer');
        $arrCustomer = $this->CustModel->getCustomer($customer);

        $oldPass = $this->request->getVar('oldPass');
        $newPass = $this->request->getVar('newPass');
        $confPass = $this->request->getVar('confPass');

        if (password_verify($oldPass, $arrCustomer['Password'])) {
            if ($newPass == $confPass) {
                $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);

                $this->CustModel->save([
                    'idCustomer' => $customer,
                    'Password' => $hashedPass
                ]);

                $this->UserModel->update($arrCustomer['Email'], ['Password' => $hashedPass]);

                session()->setFlashdata('pesan_pass', 'berhasil menyunting password.');
            } else {
                session()->setFlashdata('pesan_error', 'password baru dan konfirmasi password tidak sama.');
            }
        } else {
            session()->setFlashdata('pesan_error', 'password lama salah.');
        }

        return redirect()->to('/Pengaduan_online/profile');
    }

    public function in_rate()
    {
        $idPengaduan = $this->request->getVar('idPengaduan');
        $rating = $this->request->getVar('rating');
        if ($rating < 1) {
            session()->setFlashdata('pesan_error', 'Mohon masukkan rating.');
            return redirect()->to("/Pengaduan_online/rating/" . $idPengaduan);
        } else {
            $this->Pengaduan_onlineModel->save([
                'idPengaduan' => $idPengaduan,
                'Rating' => $rating,
                'Ulasan' => $this->request->getVar('ulasan')
            ]);

            session()->setFlashdata('pesan', 'Berhasil memberikan ulasan.');
            return redirect()->to('/Pengaduan_online');
        }
    }

    public function input()
    // tambah label tiap rules
    {
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


        $this->Pengaduan_onlineModel->save([
            'Judul' => $this->request->getVar('judul'),
            'Isi' => $this->request->getVar('isi'),
            'idKategori' => $this->request->getVar('kategori'),
            'Lampiran' => $namalampiran,
            'Status' => 'Belum diproses',
            'idCustomer' => $this->request->getVar('idCustomer'),
            'notifCustomer' => 0,
            'notifPetugas' => 0
        ]);

        session()->setFlashdata('pesan', 'berhasil menambahkan pengaduan.');

        return redirect()->to('/Pengaduan_online');
    }

    public function update($id)
    {
        $pengaduan = $this->Pengaduan_onlineModel->find($id);

        if ($pengaduan['Lampiran'] != 'user.png') {
            //hapus file lampiran
            unlink('lampiran/' . $pengaduan['Lampiran']);
        }

        $lampiran = $this->request->getFile('lampiran');
        if ($lampiran->getError() == 4) {
            $namalampiran = 'user.png';
        } else {
            //ambil nama file
            $namalampiran = $lampiran->getRandomName();
            //pindah file
            $lampiran->move('lampiran', $namalampiran);
        }

        $this->Pengaduan_onlineModel->save([
            'idPengaduan' => $id,
            'Judul' => $this->request->getVar('judul'),
            'Isi' => $this->request->getVar('isi'),
            'idKategori' => $this->request->getVar('kategori'),
            'Lampiran' => $namalampiran,
            'Status' => 'Belum diproses',
            'idCustomer' => $this->request->getVar('idCustomer'),
            'notifCustomer' => 0,
            'notifPetugas' => 0
        ]);

        session()->setFlashdata('pesan', 'berhasil mengubah pengaduan.');

        return redirect()->to('/Pengaduan_online');
    }

    public function cancel($id)
    {
        $this->Pengaduan_onlineModel->save([
            'idPengaduan' => $id,
            'Status' => 'Dibatalkan',
            'notifCustomer' => 0
        ]);

        session()->setFlashdata('pesan', 'berhasil membatalkan pengaduan.');

        return redirect()->to('/Pengaduan_online');
    }

    public function delete($id)
    {
        $pengaduan = $this->Pengaduan_onlineModel->find($id);

        if ($pengaduan['Lampiran'] != 'user.png') {
            //hapus file lampiran
            unlink('lampiran/' . $pengaduan['Lampiran']);
        }

        $this->Pengaduan_onlineModel->delete($id);

        session()->setFlashdata('pesan', 'berhasil menghapus pengaduan.');

        return redirect()->to('/Pengaduan_online');
    }
}
