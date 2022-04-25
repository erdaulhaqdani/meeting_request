<?php

namespace App\Controllers;

use App\Models\PetugasModel;
use App\Models\AuthModel;


class AuthPetugas extends BaseController
{
  public function register()
  {
    $data = [
      'Nama' => $this->request->getPost('nama'),
      'NIP' => $this->request->getPost('nip'),
      'Email' => $this->request->getPost('email'),
      // 'kantor' => $this->request->getPost('kantor'),
      'Unit' => $this->request->getPost('unit'),
      'idLevel' => $this->request->getPost('level'),
      'Password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),

    ];
    $model = new PetugasModel;
    $model->insert($data);
    session()->setFlashdata('pesan', 'Selamat Anda Berhasil Registrasi');
    return redirect()->to('/login_petugas');
  }

  public function login()
  {
    $model = new AuthModel;
    $table = 'petugas_apt';
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    $row = $model->get_data_login2($email, $table);
    if ($row == NULL) {
      session()->setFlashdata('pesan', 'Email anda tidak terdaftar');
      return redirect()->to('/login_petugas');
    }

    if (password_verify($password, $row->Password)) {
      $data = [
        'log_petugas' => TRUE,
        'nama' => $row->Nama,
        'nip' => $row->NIP,
        'email' => $row->Email,
        'unit' => $row->Unit,
        'idPetugas' => $row->idPetugas

      ];
      session()->set($data);
      session()->setFlashdata('pesan', 'Berhasil Login');
      return redirect()->to('/admin');
    } else {
      session()->setFlashdata('pesan', 'Password salah');
      return redirect()->to('/login_petugas');
    }
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    session()->setFlashdata('pesan', 'Berhasil Logout');
    return redirect()->to('/login_petugas');
  }
}
