<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\CustModel;

class Frontend extends BaseController
{
  protected $KategoriModel;
  protected $CustModel;

  public function __construct()
  {
    $this->KategoriModel = new KategoriModel();
    $this->CustModel = new CustModel();
  }
  public function register_cust()
  {

    $data = [
      'validation' => \Config\Services::validation(),
      'title' => 'Registrasi Customer'
    ];
    return view('frontend/register_cust', $data);
  }

  public function register_petugas()
  {

    $data = [
      'validation' => \Config\Services::validation(),
      'title' => 'Registrasi Petugas',

    ];
    return view('frontend/register_petugas', $data);
  }

  public function login_cust()
  {
    $data = [
      'validation' => \Config\Services::validation(),
      'title' => 'Login Customer'
    ];
    return view('frontend/login_cust', $data);
  }

  public function reset_pw_cust($id)
  {
    $data = [
      'validation' => \Config\Services::validation(),
      'customer' => $this->CustModel->getCustomer($id),
      'title' => 'Reset Password',
      'email' => $id
    ];

    return view('frontend/reset_password', $data);
  }

  public function login_petugas()
  {
    $data = [
      'title' => 'Login Petugas'
    ];
    return view('frontend/login_petugas', $data);
  }
}
