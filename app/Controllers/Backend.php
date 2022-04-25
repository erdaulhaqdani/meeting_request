<?php

namespace App\Controllers;

class Backend extends BaseController
{
  public function dashboard_cust()
  {
    return view('backend/dashboard_cust');
  }

  public function dashboard_petugas()
  {
    return view('backend/dashboard_petugas');
  }
}
