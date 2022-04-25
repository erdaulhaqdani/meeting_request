<?php

namespace App\Controllers;

use App\Models\CustModel;
use App\Models\AuthModel;

class AuthCust extends BaseController
{
  public function register()
  {
    $val = $this->validate(
      [
        'nik' => [
          'rules' => 'is_unique[customer.nik]',
          'errors' => [
            'is_unique' => 'NIK sudah terdaftar',
          ]
        ],
        'email' => [
          'rules' => 'is_unique[customer.email]',
          'errors' => [
            'is_unique' => 'Email sudah terdaftar'
          ]
        ]

      ]

    );
    if (!$val) {
      $validation = \Config\Services::validation();
      return redirect()->to('/register_cust')->withInput()->with('validation', $validation);
    }

    $data = [
      'Nama' => $this->request->getPost('nama'),
      'NIK' => $this->request->getPost('nik'),
      'Email' => $this->request->getPost('email'),
      'jenisKelamin' => $this->request->getPost('jk'),
      'Pekerjaan' => $this->request->getPost('pekerjaan'),
      'Password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),

    ];
    $model = new CustModel;
    $model->insert($data);
    session()->setFlashdata('pesan_regis', 'Selamat Anda Berhasil Registrasi');
    return redirect()->to('/login_cust');
  }

  public function login()
  {
    $model = new AuthModel;
    $table = 'customer';
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    $row = $model->get_data_login($email, $table);
    if ($row == NULL) {
      session()->setFlashdata('pesan', 'Email anda tidak terdaftar');
      return redirect()->to('login_cust');
    }

    if (password_verify($password, $row->Password)) {
      $data = [
        'log_cust' => TRUE,
        'nama' => $row->Nama,
        'nik' => $row->NIK,
        'email' => $row->Email,
        'pekerjaan' => $row->Pekerjaan,
        'idCustomer' => $row->idCustomer

      ];
      session()->set($data);
      session()->setFlashdata('pesan', 'Berhasil Login');
      return redirect()->to('Meeting_request');
    } else {
      session()->setFlashdata('pesan', 'Password salah');
      return redirect()->to('login_cust');
    }
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    session()->setFlashdata('pesan', 'Berhasil Logout');
    return redirect()->to('login_cust');
  }
}
