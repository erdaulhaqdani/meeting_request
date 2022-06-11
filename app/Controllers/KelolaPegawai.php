<?php

namespace App\Controllers;

use App\Models\Landing_pageModel;
use App\Models\UnitModel;
use App\Models\JabatanModel;
use App\Models\PegawaiModel;


class KelolaPegawai extends BaseController
{
    protected $Landing_pageModel;
    protected $PegawaiModel;
    protected $UserModel;
    protected $UnitModel;
    protected $JabatanModel;

    public function __construct()
    {
        $this->Landing_pageModel = new Landing_pageModel();
        $this->PegawaiModel = new PegawaiModel();
        $this->UnitModel = new UnitModel();
        $this->JabatanModel = new JabatanModel();
    }

    public function form_pegawai()
    {
        $data = [
            'title' => 'Tambah Pegawai',
            'pegawai' => $this->PegawaiModel->findAll(),
            'unit' => $this->UnitModel->findAll(),
            'jabatan' => $this->JabatanModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('/kelola_pegawai/tambah_pegawai', $data);
    }

    public function input_pegawai()
    // tambah label tiap rules
    {
        $hashedPassword = md5($this->request->getVar('password'), PASSWORD_DEFAULT);

        // $cek = $this->request->getVar();
        // dd($cek);

        $this->PegawaiModel->save([
            'idPegawai' => $this->request->getVar('idPegawai'),
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'jenisKelamin' => $this->request->getVar('jenisKelamin'),
            'unit' => $this->request->getVar('unit'),
            'email' => $this->request->getVar('email'),
            'status' => $this->request->getVar('status'),
            'password' => $hashedPassword,
            'idJabatan' => $this->request->getVar('jabatan'),
            'idUnit' => $this->request->getVar('unit'),

        ]);

        // $this->UserModel->save([
        //   'Email' => $this->request->getVar('email'),
        //   'Password' => $hashedPassword,
        //   'idLevel' => $this->request->getVar('level')
        // ]);

        session()->setFlashdata('pesan', 'Berhasil menambahkan petugas.');

        return redirect()->to('/KelolaPegawai/daftar_pegawai');
    }

    public function daftar_pegawai()
    {
        $data = [
            'title' => 'Daftar Pegawai',
            'pegawai' => $this->PegawaiModel->findAll(),
            'unit' => $this->UnitModel->findAll(),
            'jabatan' => $this->JabatanModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('/kelola_pegawai/daftar_pegawai', $data);
    }

    public function detail_pegawai($idPegawai)
    {
        $data = [
            'title' => 'Detail Pegawai',
            'pegawai' => $this->PegawaiModel->findAll($idPegawai),
            'unit' => $this->UnitModel->findAll(),
            'jabatan' => $this->JabatanModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('/kelola_pegawai/detail_pegawai', $data);
    }

    public function edit_pegawai($idPegawai)
    {
        $data = [
            'title' => 'Edit Pegawai',
            'pegawai' => $this->PegawaiModel->findAll($idPegawai),
            'unit' => $this->UnitModel->findAll(),
            'jabatan' => $this->JabatanModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('/kelola_pegawai/edit_pegawai', $data);
    }

    public function update_pegawai($idPegawai)
    // tambah label tiap rules
    {
        $hashedPassword = md5($this->request->getVar('password'), PASSWORD_DEFAULT);

        $this->PetugasModel->save([
            'idPegawai' => $idPegawai,
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'jenisKelamin' => $this->request->getVar('jenisKelamin'),
            'unit' => $this->request->getVar('unit'),
            'email' => $this->request->getVar('email'),
            'status' => $this->request->getVar('status'),
            'password' => $hashedPassword,
        ]);

        session()->setFlashdata('pesan', 'Berhasil mengubah data petugas.');

        return redirect()->to('/KelolaPegawai/daftar_pegawai');
    }
}
