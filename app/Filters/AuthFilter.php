<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    $session = session();
    if ($session->get('log') != TRUE) {
      return redirect()->to('/login_cust');
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    if (session('log') == TRUE && session('idLevel') == 5) {
      return redirect()->to('/dashboard_cust');
    } elseif (session('log') == TRUE && session('idLevel') == 1) {
      return redirect()->to('/dashboard_admin_landing');
    } elseif (session('log') == TRUE && session('idLevel') == 7) {
      return redirect()->to('dashboard_petugas');
    }
  }
}
