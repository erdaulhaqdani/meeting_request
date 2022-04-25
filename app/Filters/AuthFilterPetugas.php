<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilterPetugas implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    $session = session();
    if ($session->get('log_petugas') != TRUE) {
      return redirect()->to('/login_petugas');
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    $session = session();
    if ($session->get('log_petugas') == TRUE) {
      return redirect()->to('/admin');
    }
  }
}
