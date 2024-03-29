<?php

namespace App\Controllers;

use App\Models\CustModel;
use App\Models\UserModel;
use App\Models\AuthModel;
use App\Models\PetugasModel;
use App\Models\LevelModel;

class AuthCust extends BaseController
{
  protected $CustModel;
  protected $UserModel;
  protected $PetugasModel;
  protected $LevelModel;

  public function __construct()
  {
    $this->CustModel = new CustModel();
    $this->UserModel = new UserModel();
    $this->PetugasModel = new PetugasModel();
    $this->LevelModel = new LevelModel();
    $this->email = \Config\Services::email();
  }

  public function register_petugas()
  {
    // $val = $this->validate(
    //   [
    //     'nip' => [
    //       'rules' => 'is_unique[petugas_apt.nip]',
    //       'errors' => [
    //         'is_unique' => 'NIP belum terdaftar',
    //       ]
    //     ]
    //   ]

    // );
    // if (!$val) {
    //   $validation = \Config\Services::validation();
    //   return redirect()->to('register_petugas')->withInput()->with('validation', $validation);
    // }

    $hashedPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

    $model = new PetugasModel();
    $table = 'petugas_apt';
    $nip = $this->request->getVar('nip');
    $email = $this->request->getVar('email');
    $row = $model->get_nip($nip, $table);
    $domain =  substr($email, -14, 14);

    if ($row == NULL) {
      session()->setFlashdata('pesan', 'NIP anda tidak terdaftar');
      return redirect()->to('/register_petugas');
    } elseif ($row) {

      if ($domain != 'kemenkeu.go.id') {
        session()->setFlashdata('pesan', 'Mohon gunakan email kemenkeu');
        return redirect()->to('/register_petugas');
      }
      $data = [
        'nip' => $row->NIP,
      ];
      $row_cust = $model->get_nip($data['nip'], 'petugas_apt');

      $data = [
        'idLevel' => $row_cust->idLevel,
        'idPetugas' => $row_cust->idPetugas
      ];
    }
    $this->PetugasModel->save([
      'idPetugas' => $data['idPetugas'],
      'Email' => $email,
      'Password' => $hashedPassword,
    ]);

    $this->UserModel->save([
      'Email' => $this->request->getVar('email'),
      'Password' => $hashedPassword,
      'idLevel' => $data['idLevel']
    ]);

    session()->setFlashdata('pesan_regis', 'Selamat Anda Berhasil Registrasi Petugas');
    return redirect()->to(base_url('login_cust'));
  }



  public function register()
  {
    $val = $this->validate(
      [
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

    $hashedPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    $email = $this->request->getVar('email');
    $domain =  substr($email, -9, 9);

    if ($domain != 'gmail.com') {
      session()->setFlashdata('pesan', 'Email tidak valid');
      return redirect()->to('/register_cust');
    }

    $this->CustModel->save([
      'Nama' => $this->request->getVar('nama'),
      'Username' => $this->request->getVar('username'),
      'Email' => $this->request->getVar('email'),
      'noHP' => $this->request->getVar('noHP'),
      'Password' => $hashedPassword,
      'StatusAkun' => 'NonAktif',
      'idLevel' => '5'
    ]);

    $this->UserModel->save([
      'Email' => $this->request->getVar('email'),
      'Password' => $hashedPassword,
      'idLevel' => '5'
    ]);

    $to = $this->request->getVar('email');

    $message = "<h2>Verifikasi Akun APT Bersama</h2><p>Silakan verifikasi akun APTB anda dengan klik tombol di bawah ini.</p <a href='http://localhost:8080/login_cust/" . $to . "'>Verifikasi Akun APTB</a> <br> <p>Selanjutnya anda akan diarahkan ke halaman Login APT Bersama KPKNL Bandung.</p> ";

    $verifikasi = $this->sendEmail($to, 'Verifikasi Akun APTB', $message);

    if ($verifikasi) {
      session()->setFlashdata('pesan_regis', 'Anda berhasil registrasi, silakan cek email Anda untuk verifikasi');
    } else {
      session()->setFlashdata('regis_gagal', 'Registrasi gagal');
    }
    return redirect()->to('/login_cust');
  }

  public function sendEmail($to, $subject, $message)
  {
    $this->email->setFrom('zmika360@gmail.com', 'KPKNL Bandung');
    $this->email->setTo($to);

    $this->email->setSubject($subject);

    $this->email->setMessage($message);

    if (!$this->email->send()) {
      return false;
    } else {
      return true;
    }
  }

  public function VerifikasiAKun($email)
  {
    $model = new CustModel;
    $table = 'customer';

    $row = $model->getCustomerEmail($email, $table);
    if ($row) {
      $model->save([
        'idCustomer' => $row->idCustomer,
        'StatusAkun' => 'Aktif'
      ]);
      session()->setFlashdata('pesan_regis', 'Verifikasi akun berhasil, silakan login');
    } else {
      session()->setFlashdata('pesan', 'Verifikasi akun gagal');
    }
    return redirect()->to('/login_cust');
  }

  public function login()
  {
    $model = new AuthModel;
    $table = 'user';
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');
    $row = $model->get_data_login($email, $table);

    $table_customer = 'customer';
    $row_customer = $this->CustModel->get_data($email, $table_customer);

    if ($row == NULL) {
      session()->setFlashdata('pesan', 'Email anda tidak terdaftar');
      return redirect()->to('/login_cust');
    }

    // $password = password_hash($password, PASSWORD_DEFAULT);
    // dd($password, $row->Password);
    if (password_verify($password, $row->Password)) {
      $data = [
        'log' => TRUE,
        'email' => $row->Email,
        'idLevel' => $row->idLevel,
        'Kelompok' => $this->LevelModel->getKelompok($row->idLevel)
      ];

      $kelompok = $data['Kelompok'];

      if ($kelompok[0] == 'Customer') {
        if ($row_customer->StatusAkun == 'Aktif' || $row_customer->StatusAkun == 'Terverifikasi') {
          $row_cust = $model->get_data_login($data['email'], 'customer');
          $row_user = $model->get_data_login($data['email'], 'user');

          $data = [
            'log' => TRUE,
            'idCustomer' => $row_cust->idCustomer,
            'Nama' => $row_cust->Nama,
            'Email' => $row_cust->Email,
            'Username' => $row_cust->Username,
            'noHP' => $row_cust->noHP,
            'idLevel' => $row_cust->idLevel,
            'Kelompok' => $kelompok[0],
            'StatusAkun' => $row_cust->StatusAkun,
            'idUser' => $row_user->idUser
          ];

          session()->set($data);
          session()->setFlashdata('pesan', 'Berhasil Login');

          return redirect()->to('/dashboard_cust/1/0');
        } else {
          session()->setFlashdata('pesan', 'Akun belum aktif, silakan verifikasi melalui email');
          return redirect()->to('/login_cust');
        }
      } elseif ($kelompok[0] == 'APT') {
        $row_petugas = $model->get_data_login($data['email'], 'petugas_apt');

        $data = [
          'log' => TRUE,
          'idPetugas' => $row_petugas->idPetugas,
          'NIP' => $row_petugas->NIP,
          'Nama' => $row_petugas->Nama,
          'Email' => $row_petugas->Email,
          'idLevel' => $row_petugas->idLevel,
          'Unit' => $row_petugas->Unit,
          'Kelompok' => $kelompok[0]
        ];

        session()->set($data);
        session()->setFlashdata('pesan', 'Berhasil Login');

        return redirect()->to('/dashboard_petugas/1/0');
      } elseif ($kelompok[0] == 'LP') {
        $row_petugas = $model->get_data_login($data['email'], 'petugas_apt');

        $data = [
          'log' => TRUE,
          'idPetugas' => $row_petugas->idPetugas,
          'NIP' => $row_petugas->NIP,
          'Nama' => $row_petugas->Nama,
          'Email' => $row_petugas->Email,
          'idLevel' => $row_petugas->idLevel,
          'Kelompok' => $kelompok[0]
        ];

        session()->set($data);
        session()->setFlashdata('pesan', 'Berhasil Login');

        return redirect()->to('/dashboard_admin_landing');
      }
    } else {
      session()->setFlashdata('pesan', 'Password salah');
      return redirect()->to('/login_cust');
    }
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    session()->setFlashdata('pesan', 'Berhasil Logout');
    return redirect()->to('login_cust');
  }

  public function resetPassword()
  {
    $model = new AuthModel;
    $table = 'user';
    $email = $this->request->getVar('email_forgot');
    $row = $model->get_data_login($email, $table);
    if ($row == NULL) {
      session()->setFlashdata('pesan_reset', 'Email anda tidak terdaftar');
    } else {
      session()->setFlashdata('pesan_reset2', 'Silakan cek email anda untuk me-reset password');

      $message = "<h2>Reset Password Akun APT Bersama</h2><p>Silakan klik link di bawah ini untuk masuk ke halaman reset password akun Anda.</p <a href='http://localhost:8080/reset_pw/" . $email . "'>Reset Password Akun APTB</a>";

      $this->sendEmail($email, 'Reset Password Akun APTB', $message);
    }
    return redirect()->to('/login_cust');
  }

  public function updatePassword($email)
  {
    $model = new CustModel();
    $authmodel = new AuthModel();
    $table = 'customer';

    $confirm_pw = $this->request->getVar('confirm_pw');
    $password = $this->request->getVar('password');

    if ($password == $confirm_pw) {
      $row = $model->getCustomerEmail($email, $table);
      if ($row) {
        $hashedPassword = password_hash(($confirm_pw), PASSWORD_DEFAULT);
        $model->save([
          'idCustomer' => $row->idCustomer,
          'Password' => $hashedPassword,
        ]);
        $authmodel->save([
          'Email' => $email,
          'Password' => $hashedPassword,
        ]);

        session()->setFlashdata('pesan_regis', 'Password berhasil di reset');
      } else {
        session()->setFlashdata('pesan_regis', 'Password gagal di reset');
      }
      return redirect()->to('/login_cust');
    } else {
      session()->setFlashdata('pesan', 'Konfirmasi password salah');
      return redirect()->to('/reset_pw/' . $email);
    }
  }
}
